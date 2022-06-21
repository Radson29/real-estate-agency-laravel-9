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
        Schema::create('kontakt', function (Blueprint $table) {
            $table->id();
            $table->string('Imie');
            $table->string('email');
            $table->string('numer_telefonu');
            $table->text('opis');
            $table->unsignedBigInteger('id_nieruchomosci');
            $table->foreign('id_nieruchomosci')->references('id')->on('nieruchomosci')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('id_uzytkownika');
            $table->foreign('id_uzytkownika')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('kontakt');
    }
};
