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
        Schema::create('dependentes', function (Blueprint $table) {
            $table->id('idDependente')->unsigned()->unique();
            $table->bigInteger('numCPFDependente');
            $table->string('nomeDependente', 100)->nullable();
            $table->string('sexoDependente', 45)->nullable();
            $table->dateTime('dataNascimentoDependente')->nullable();
            $table->string('grauParentesco', 45)->nullable();
            $table->unsignedBigInteger('idCandidato')->unsigned();
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
        Schema::dropIfExists('dependentes');
    }
};
