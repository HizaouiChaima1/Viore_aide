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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('photo', 300); // Ajustement de la taille de la colonne photo
            $table->string('Référence');
            $table->bigInteger('Produit')->default(0);
            $table->bigInteger('Combinaisons')->default(0);
            $table->bigInteger('Cartes_cadeau')->default(0);
            $table->unsignedBigInteger('categoriep_id')->nullable(); // Ajout de la colonne pour la clé étrangère
            $table->foreign('categoriep_id')->references('id')->on('categoriesp')->onDelete('cascade');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};