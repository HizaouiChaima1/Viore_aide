<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationControllers extends Controller
{
    // Vos autres méthodes du contrôleur

    public function markAsRead($id)
    {
        // On teste d'abord le guard 'employee' (comme c'était dans OrdersController)
        if (Auth::guard('employee')->check()) {
            $notification = Auth::guard('employee')->user()->notifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
            }
            return redirect()->back();
        }

        // Sinon on retombe sur le auth par défaut
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function markAllAsRead()
    {
        if (Auth::guard('employee')->check()) {
            Auth::guard('employee')->user()->unreadNotifications->markAsRead();     
        } else {
            auth()->user()->unreadNotifications->markAsRead();
        }
        return redirect()->back();
    }
}