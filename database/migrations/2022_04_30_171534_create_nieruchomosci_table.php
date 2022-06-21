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
        Schema::create('nieruchomosci', function (Blueprint $table) {
            $table->id();
            $table->string('tytuł', 200);
            $table->text('opis');
            $table->float('cena', 10, 2);
            $table->float('powierzchnia', 10, 2);
            $table->integer('sypialnie');
            $table->integer('garaże');
            $table->integer('łazienki');
            $table->string('Miasto');
            $table->string('Kraj');
            $table->string('zdjecie_opcjonalne0')->nullable();
            $table->string('zdjecie_opcjonalne1')->nullable();
            $table->string('zdjecie_opcjonalne2')->nullable();
            $table->string('zdjecie_opcjonalne3')->nullable();
            $table->unsignedBigInteger('id_agenta')->nullable();
            $table->foreign('id_agenta')->references('id')->on('agenci')->constrained()
            ->onDelete('cascade');
            $table-> enum('Czy_opublikowany',['0','1']);
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
        Schema::dropIfExists('nieruchomosci');
    }
};
