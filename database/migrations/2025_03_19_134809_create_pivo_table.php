<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_equipe', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->references('id')->on('users');
        // $table->string('user_role');
        $table->foreignId('equipe_id')->references('id')->on('equipes');
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
        Schema::dropIfExists('user_equip');
    }
}
