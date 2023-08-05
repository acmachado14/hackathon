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
        Schema::create('confidentes_da_alfa', function (Blueprint $table) {
            $table->id('idConfidenteDaAlfa')->unsigned()->unique();
            $table->string('nomeConfidenteNaAlfa', 80);
            $table->string('cidade', 100);
            $table->string('funcao', 100);
            $table->unsignedBigInteger('idCandidato');

            $table->foreign('idCandidato')
                ->references('idCandidato')
                ->on('candidatos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confidentes_da_alfa');
    }
};
