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
        Schema::create('solicitacoes_agendamentos_recisao', function (Blueprint $table) {
            $table->id('idAgendamentosRecisao')->unsigned()->unique();
            $table->dateTime('dataSolicitacaoRecisao')->nullable();
            $table->dateTime('dataAprovacaoReprovacaoRecisao')->nullable();
            $table->string('motivo', 45)->nullable();
            $table->integer('rankRecontratacao');
            $table->unsignedBigInteger('idCandidato')->unsigned();
            $table->string('statusRecisao', 45)->nullable();
            $table->foreign('idCandidato')->references('idCandidato')->on('candidatos');
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
        Schema::dropIfExists('solicitacoes_agendamentos_recisao');
    }
};
