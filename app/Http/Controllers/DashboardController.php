<?php

namespace App\Http\Controllers;

use App\Models\Commands;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord avec les statistiques de commandes.
     * GRASP: Pure Fabrication / SOLID: Single Responsibility Principle
     */
    public function index(): View
    {
        $orders = Commands::all();
        $totalOrders = $orders->count();

        // Calculate the number of orders each day
        $orderCountsByDay = DB::table('commands')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get()
            ->keyBy('date');

        // Calculate the number of orders each month
        $orderCountsByMonth = DB::table('commands')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
            ->groupBy('year', 'month')
            ->get()
            ->map(function ($item) {
                return [
                    'year' => $item->year,
                    'month' => $item->month,
                    'count' => $item->count,
                    'label' => date('F', mktime(0, 0, 0, $item->month, 1)),
                ];
            });

        return view('admin.tabledebord', compact('orders', 'totalOrders', 'orderCountsByDay', 'orderCountsByMonth'));
    }
}
