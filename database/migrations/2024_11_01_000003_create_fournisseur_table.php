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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Code');
            $table->string('Nom_contact');
            $table->bigInteger('numero_de_téléphone');
            $table->string('Email_principale')->unique();
            $table->string('Email_secondaire')->unique();     
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('fournisseurs');}

};
