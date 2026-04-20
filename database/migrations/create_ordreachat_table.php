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
        Schema::create('Ordredachat', function (Blueprint $table) {
            $table->id();
            $table->string('fournisseur');
            $table->string('destination');
            $table->date('date_livraison');
            $table->string('note');
            $table->string('status')->default('approuvé');  
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('Ordredachat');}

};
