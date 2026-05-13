<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commands;
use App\Models\Employe;
use App\Notifications\OrderCreated;
use App\Contracts\PanierOrderValidatorInterface;
<<<<<<< HEAD
use App\Services\OCL\OclTotalCoherentValidator;
=======
use App\Services\OrderNotificationService;
>>>>>>> 4934e5cc3f8d250b59411a99f8a323b95b335e4a

/**
 * Patron Template Method — Classe abstraite
 *
 * Cette classe définit le squelette de l'algorithme de gestion du panier.
 * Les étapes communes (ajouter un produit, notifier les employés, vider la session)
 * sont implémentées ici. Les étapes variables sont déléguées aux sous-classes
 * via des méthodes abstraites.
 *
 * Rôles du patron :
 *   - AbstractClass : AbstractPanierController  
 *   - ConcreteClass : CartController, CaisseController
 */
abstract class AbstractPanierController extends Controller
{
    public function __construct(
        protected PanierOrderValidatorInterface $panierOrderValidator,
        protected OclTotalCoherentValidator $oclValidator = new OclTotalCoherentValidator()
    ) {
    }

    //  MÉTHODES ABSTRAITES — à implémenter dans chaque sous-classe

    /**
     * Retourne la clé de session utilisée pour stocker le panier.
     */
    abstract protected function getSessionKey(): string;

    /**
     * Retourne la source de la commande.
     */
    abstract protected function getSource(): string;

    /**
     * Valide et retourne les données du formulaire de sauvegarde.
     * Chaque sous-classe a ses propres champs obligatoires.
     */
    abstract protected function validerDonnees(Request $request): array;

    /**
     * Construit et retourne un objet Commands à partir des données validées.
     * Chaque sous-classe mappe ses propres champs au modèle.
     */
    abstract protected function construireCommande(array $data, array $produits): Commands;

    //  MÉTHODES TEMPLATE — logique commune aux deux sous-classes

    /**
     * [TEMPLATE] Ajouter un produit au panier.
     * Algorithme identique pour Cart et Caisse, seule la clé de session change.
     */
    public function ajouterProduit(Request $request)
    {
        $productId = $request->input('productId');
        $product = Produit::find($productId);

        if (!$product) {
            return redirect()->back()->withError('Le produit n\'existe pas.');
        }

        $sessionKey = $this->getSessionKey();
        $panier = session()->get($sessionKey, []);
        $clicks = session('clicks', []);

        // Incrémenter le compteur de clics
        $clicks[$productId] = ($clicks[$productId] ?? 0) + 1;
        session(['clicks' => $clicks]);

        // Ajouter ou incrémenter la quantité
        if (array_key_exists($productId, $panier)) {
            $panier[$productId]['quantity']++;
        } else {
            $panier[$productId] = [
                'product'  => $product,
                'quantity' => 1,
            ];
        }

        session([$sessionKey => $panier]);
        return redirect()->back()->withSuccess('Le produit a été ajouté au panier.');
    }

    /**
     * [TEMPLATE] Sauvegarder la commande en base de données.
     */
    public function save(Request $request)
    {
        // ═══════════════════════════════════════════════════════
        // Patron Chain of Responsibility — Pipeline de validation (injecté, DIP)
        // ═══════════════════════════════════════════════════════
        $panier = session()->get($this->getSessionKey(), []);

        $erreur = $this->panierOrderValidator->validate($request, $panier);

        if ($erreur !== null) {
            // Un handler a bloqué la chaîne — on retourne l'erreur
            return redirect()->back()->withErrors([$erreur['champ'] => $erreur['message']]);
        }
        // ═══════════════════════════════════════════════════════

        // Étape 1 — validation (spécifique à chaque sous-classe)
        $data = $this->validerDonnees($request);

        // Étape 3 — formater les produits
        $produits = [];
        foreach ($panier as $productId => $item) {
            $produits[] = [
                'id'          => $productId,
                'nom'         => $item['product']->Nom,
                'quantite'    => $item['quantity'],
                'prix_unitaire' => $item['product']->Prix,
                'total'       => $item['product']->Prix * $item['quantity'],
            ];
        }

        // Étape 4 — construire et persister la commande (spécifique à chaque sous-classe)
        $command = $this->construireCommande($data, $produits);
        
        // ═══════════════════════════════════════════════════════
        // Patron GRASP : Polymorphisme (Calcul des frais)
        // ═══════════════════════════════════════════════════════
        $sousTotal = collect($produits)->sum('total');
        $typeCommande = $data['type_commande'] ?? 'sur_place'; // Valeur par défaut
        
        // Instanciation polymorphique selon le type
        $calculateur = match($typeCommande) {
            'livraison' => new \App\Services\Frais\CommandeLivraisonFrais(),
            'emporter'  => new \App\Services\Frais\CommandeEmporterFrais(),
            default     => new \App\Services\Frais\CommandeSurPlaceFrais(),
        };
        
        // Appel polymorphique
        $frais = $calculateur->calculerFrais($sousTotal);
        $command->total_price = $sousTotal + $frais;
        // ═══════════════════════════════════════════════════════

        $command->produits = json_encode($produits);
        $command->source   = $this->getSource();

        // ═══════════════════════════════════════════════════════
        // OCL C6 — Postcondition : TotalAvecFraisCoherent
        // Vérifie que total_price = Σ(prix × quantité) + frais
        // avant toute persistance en base de données.
        // ═══════════════════════════════════════════════════════
        $this->oclValidator->verifierPostcondition($command, $produits);

        $command->save();

        // Étape 5 — notifier tous les employés
        $this->notifierEmployes($command);

        // Étape 6 — vider la session
        $this->viderSession();

        return redirect()->back()->with('success', 'La commande a été enregistrée avec succès.');
    }

    /**
     * [TEMPLATE] Vider la session du panier.
     * Identique pour les deux sous-classes.
     */
    public function refreshCartSession()
    {
        $this->viderSession();
        return redirect()->back()->with('msg', 'Session rafraîchie avec succès.');
    }

    //  MÉTHODES PRIVÉES — utilitaires internes

    /**
     * Envoie une notification OrderCreated à tous les employés.
     */
    // APRÈS
    private function notifierEmployes(Commands $command): void
    {
        $notifier = app(OrderNotificationService::class);
        $notifier->notifierTousLesEmployes($command);
    }

    /**
     * Supprime les données de session liées au panier.
     */
    private function viderSession(): void
    {
        session()->forget($this->getSessionKey());
        session()->forget('clicks');
        session()->forget('success');
    }
}
