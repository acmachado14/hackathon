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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id('idCandidato')->unsigned()->unique();
            $table->string('nomeCandidato', 80);
            $table->string('nomeMae', 80);
            $table->string('nomePai', 80);
            $table->string('sexoCandidato', 45);
            $table->string('estadoCivil', 45);
            $table->string('grauInstrucao', 45);
            $table->string('racaCor', 45);
            $table->dateTime('dataNascimentoCandidato');
            $table->string('nacionalidade', 45);
            $table->string('paisNascimento', 45);
            $table->string('estadoNascimento', 45)->nullable();
            $table->string('cidadeNascimento', 45)->nullable();
            $table->integer('numeroBotina');
            $table->integer('numeroCalca');
            $table->string('tamanhoCamisa', 3);
            $table->string('email', 80);
            $table->bigInteger('numIdentidade');
            $table->string('orgaoEmissorIdentidade', 10)->nullable();
            $table->string('estadoOrgaoEmissor', 45);
            $table->string('cidadeEmissaoIdentidade', 45);
            $table->string('dataExpedicaoIdentidade', 45);
            $table->bigInteger('numCPF');
            $table->bigInteger('numPisPasep');
            $table->string('anexoIdentidade', 255);
            $table->string('anexoCPF', 255);
            $table->string('anexoCurriculo', 255);
            $table->string('anexoCNH', 255);
            $table->string('anexoCertificadoReservista', 255);
            $table->string('status', 45);

            $table->unsignedBigInteger('idEndereco');
            $table->foreign('idEndereco')->references('idEndereco')->on('enderecos');

            $table->unsignedBigInteger('idFuncao');
            $table->foreign('idFuncao')->references('idFuncao')->on('funcoes');
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
        Schema::dropIfExists('candidatos');
    }
};
