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
        Schema::create('reductions', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('qualification');
            $table->string('type_reduction');
            $table->string('reference');
            $table->string('status')->default('Actif');
            $table->bigInteger('montant_reductionF')->default(0);
            $table->bigInteger('montant_reductionP')->default(0);
            $table->bigInteger('reduction_maximale')->default(0);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('reductions');}

};
