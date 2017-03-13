<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_new', function (Blueprint $table) {
            $table->integer('new_id');
            $table->integer('festival_id');
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade');
            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade');
            $table->primary(['new_id', 'festival_id']);
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
        Schema::dropIfExists('festival_new');
    }
}
