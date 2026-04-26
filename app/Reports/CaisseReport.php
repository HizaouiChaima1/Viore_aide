<?php
namespace App\Reports;

use App\Models\commands;

class CaisseReport extends AbstractReport
{
    protected function recupererDonnees(int $restaurantId): array
    {
        return commands::where('restaurant_id', $restaurantId)
            ->get()
            ->toArray();
    }

    protected function formater(array $donnees): array
    {
        $total = array_sum(array_column($donnees, 'total_price'));
        return [
            'nombre_commandes' => count($donnees),
            'total_caisse'     => $total,
        ];
    }

    // Override du hook — filtrer uniquement les commandes d'aujourd'hui
    protected function filtrer(array $donnees): array
    {
        return array_filter($donnees, fn($c) =>
            date('Y-m-d', strtotime($c['created_at'])) === date('Y-m-d')
        );
    }
}