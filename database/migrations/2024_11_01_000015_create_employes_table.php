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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Email')->unique();
            $table->string('photo', 300)->nullable()->default('slims.jpg');
            $table->timestamp('Email_verified_at')->nullable();
            $table->bigInteger('numero_de_téléphone');
            $table->string('password');
            $table->string('Rôle'); 
            $table->string('nomrestau');     
            $table->string('customerAddress1');     
            $table->string('pays');  
            $table->string('status')->default('Actif');        
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('employes');}

};