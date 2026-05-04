<?php
namespace App\Reports;

use App\Models\commands;

class CommandesReport extends AbstractReport
{
    protected function recupererDonnees(int $restaurantId): array
    {
        return commands::where('restaurant_id', $restaurantId)
            ->latest()
            ->get()
            ->toArray();
    }

    protected function formater(array $donnees): array
    {
        return array_map(fn($c) => [
            'id'     => $c['id'],
            'total'  => $c['total_price'],
            'statut' => $c['type_commande'],
            'date'   => $c['created_at'],
        ], $donnees);
    }
}