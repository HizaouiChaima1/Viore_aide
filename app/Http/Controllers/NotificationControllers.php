<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationControllers extends Controller
{
    // Vos autres méthodes du contrôleur

  
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

}