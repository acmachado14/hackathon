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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('idReporte')->unsigned()->unique();
            $table->string('tipoReporte', 45);
            $table->string('nomeReportador', 80)->nullable();
            $table->string('centroDeCusto', 80);
            $table->string('referenciaDaAreaDeAtuacao', 80);
            $table->string('descricaoReporte', 275);
            $table->unsignedBigInteger('idlocalizacao');
            $table->timestamps();

            $table->foreign('idlocalizacao')
                ->references('idlocalizacao')
                ->on('localizacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};
