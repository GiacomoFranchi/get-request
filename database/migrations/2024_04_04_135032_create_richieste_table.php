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
        Schema::create('richieste', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->require;
            $table->string('cognome')->require;
            $table->date('data_di_nascita')->require;
            $table->string('provincia');
            $table->string('nome_comune');
            $table->text('richiesta');
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
        Schema::dropIfExists('richieste');
    }
};
