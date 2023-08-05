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
        Schema::create('candidatos_has_telefone', function (Blueprint $table) {
            $table->unsignedBigInteger('idCandidato');
            $table->unsignedBigInteger('idTelefone');
            $table->primary(['idCandidato', 'idTelefone']);

            // Chaves estrangeiras
            $table->foreign('idCandidato')->references('idCandidato')->on('candidatos');
            $table->foreign('idTelefone')->references('idTelefone')->on('telefones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos_has_telefone');
    }
};
