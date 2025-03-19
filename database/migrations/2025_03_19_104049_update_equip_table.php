<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEquipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipes', function (Blueprint $table){
            $table->dropColumn('particip_sup');
            $table->dropColumn('particip_2');
            $table->dropColumn('particip_3');
            $table->date('date_create');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes', function (Blueprint $table){
            $table->foreignId('particip_sup')->references('id')->on('users')->nullable();
            $table->foreignId('particip_2')->references('id')->on('users')->nullable();
            $table->foreignId('particip_3')->references('id')->on('users')->nullable();
            $table->dropColumn('date_create');
        });
    }
}
