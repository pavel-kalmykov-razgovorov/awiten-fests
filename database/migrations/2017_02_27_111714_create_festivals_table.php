<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('pathLogo')->nullable();
            $table->string('pathCartel')->nullable();            
            $table->string('location')->nullable();
            $table->datetime('date')->nullable();
            $table->string('province')->nullable();
            $table->string('permalink')->unique();
            $table->integer('promoter_id')->unsigned();
            $table->foreign('promoter_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}
