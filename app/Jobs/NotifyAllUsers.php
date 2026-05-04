<?php

namespace App\Jobs;

use App\Models\Restaurant;
use App\Models\User;
use App\Notifications\Allcustomers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyAllUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Restaurant $restaurant)
    {
    }

    public function handle(): void
    {
        User::query()
            ->chunkById(500, function ($users): void {
                foreach ($users as $user) {
                    $user->notify(new Allcustomers($this->restaurant));
                }
            });
    }
}
