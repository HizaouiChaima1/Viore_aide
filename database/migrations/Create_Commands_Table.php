<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
        public function up()
        {
            Schema::create('commands', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('branch');
                $table->string('type_commande');
                $table->string('client');
                $table->string('status')->default('Encours de traitement');
                $table->string('source')->default('serveur');
                $table->dateTime('heure_arrivee');
                $table->text('notes_ticket')->nullable();
                $table->text('notes_cuisine')->nullable();
                $table->json('produits')->nullable();
                $table->decimal('total_price', 10, 2)->default(0); 
                $table->timestamps();
            });
        }
    
    
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Commands');
    }
};

