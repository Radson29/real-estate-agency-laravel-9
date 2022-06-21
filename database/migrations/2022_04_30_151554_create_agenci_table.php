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
        Schema::create('agenci', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('adres');
            $table->string('email');
            $table->string('numer_telefonu');
            $table->string('zdjecie');
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
        Schema::dropIfExists('agenci');
    }
};
