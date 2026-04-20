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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('SkU');
            $table->string('Catégorie');
            $table->string('espacestockage')->nullable();
            $table->string('uniteingrediant')->nullable();    
            $table->string('methodedecalcul')->nullable();   
            $table->bigInteger('prix')->nullable();   
            $table->foreignId('fournisseur_id');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');}

};
