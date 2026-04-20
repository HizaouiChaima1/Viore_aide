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
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('nom');  
            $table->string('photo',300)->default('grey.jpeg');         
            $table->foreignId('categorie_id')->constrained(); 
            $table->string('sku')->unique();
            $table->string('code_barre')->default('___');
            $table->string('description')->default('___');
            $table->string('status')->default('Actif');   
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('combos');
    }
    

};
