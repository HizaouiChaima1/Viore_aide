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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('photo',300);
            $table->string('Produit_en_stock')->nullable();
            $table->string('SKU');
            $table->bigInteger('Prix');
            $table->string('Groupe_impot');
            $table->string('status')->default('Actif');
            $table->unsignedBigInteger('categorie_id'); 
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('Méthode_vente');
            $table->bigInteger('code_à_barre')->nullable();
            $table->string('temp_preperation')->default('___');
            $table->string('calories')->default('___');
            $table->string('description')->default('___');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');}

};

  