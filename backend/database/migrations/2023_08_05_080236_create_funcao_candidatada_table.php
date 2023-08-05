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
        Schema::create('funcao_candidatada', function (Blueprint $table) {
            $table->unsignedBigInteger('idCandidato');
            $table->unsignedBigInteger('idFuncao');
            $table->tinyInteger('ehPrincipal')->nullable();
            $table->primary(['idCandidato', 'idFuncao']);

            $table->foreign('idCandidato')
                ->references('idCandidato')
                ->on('candidatos');

            $table->foreign('idFuncao')
                ->references('idFuncao')
                ->on('funcoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcao_candidatada');
    }
};
