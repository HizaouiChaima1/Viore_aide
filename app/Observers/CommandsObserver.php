<?php

namespace App\Observers;

use App\Models\Employe;
use App\Models\commands;
use App\Notifications\OrderCreated;

class CommandsObserver
{
    /**
     * Trigger notifications whenever an order is created.
     */
    public function created(commands $command): void
    {
        $employees = Employe::all();

        foreach ($employees as $employee) {
            $employee->notify(new OrderCreated($command));
        }
    }
}
