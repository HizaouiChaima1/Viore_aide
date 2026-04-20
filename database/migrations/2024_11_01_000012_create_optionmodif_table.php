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
        Schema::create('optionmodif', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('SKU');
            $table->foreignId('modificateur_id')->constrained('modif');
            $table->bigInteger('prix');
            $table->string('groupe_impot')->default('___');
            $table->string('méthode_calcul_couts');
            $table->string('calories')->default('___');
            $table->bigInteger('cout')->default(0);
            $table->string('statut')->default('Actif');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('optionmodif');}

};
