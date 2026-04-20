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
        Schema::create('modif', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('référence');
            $table->bigInteger('option')->default(0);
            $table->bigInteger('Produits_liés')->default(0);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('modif');}

};
