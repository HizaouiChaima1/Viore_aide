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
        Schema::create('Cartes_fidelites', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('photo',300)->default('grey.jpeg');     
            $table->string('SKU');
            $table->foreignId('categorie_id')->constrained();
            $table->string('strategie_prix');
            $table->bigInteger('Prix')->default(0);
            $table->string('code_barre')->default('___');
            $table->string('status')->default('Actif');    
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('Cartes_fidelites');}

};
