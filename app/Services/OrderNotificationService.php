<?php

namespace App\Services;

use App\Models\Employe;
use App\Notifications\OrderCreated;
use App\Models\Commands;

class OrderNotificationService
{
    public function notifierTousLesEmployes(Commands $command): void
    {
        foreach (Employe::all() as $employee) {
            $employee->notify(new OrderCreated($command));
        }
    }
}