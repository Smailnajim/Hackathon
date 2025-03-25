<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->string('project_id')->default(0)->change();

            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->string('project_id')->default(null)->change();
            
        });
    }
}
