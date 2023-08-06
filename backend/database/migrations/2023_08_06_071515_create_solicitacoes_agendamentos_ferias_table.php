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
        Schema::create('solicitacoes_agendamentos_ferias', function (Blueprint $table) {
            $table->id('idAgendamentosFerias')->unsigned()->unique();
            $table->dateTime('dataSolicitacaoFerias');
            $table->dateTime('dataAprovacaoReprovacaoFerias');
            $table->dateTime('dataInicioFerias');
            $table->integer('diasSolicitados');
            $table->integer('diasAprovados');
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
        Schema::dropIfExists('solicitacoes_agendamentos_ferias');
    }
};
