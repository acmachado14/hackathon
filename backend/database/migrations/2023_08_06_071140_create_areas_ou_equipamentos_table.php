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
        Schema::create('areas_ou_equipamentos', function (Blueprint $table) {
            $table->id('idAreaEquipamento')->unsigned()->unique();
            $table->string('codigoAreaEquipamento', 45);
            $table->string('descricaoAreaEquipamento', 255);
            $table->string('statusLiberacao', 25);
            $table->string('anexoPDFDescritivo');
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
        Schema::dropIfExists('areas_ou_equipamentos');
    }
};
