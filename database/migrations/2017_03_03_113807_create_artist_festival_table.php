<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistFestivalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_festival', function (Blueprint $table) {
            $table->integer('artist_id');
            $table->integer('festival_id');
            $table->boolean('confirmed')->nullable();
            $table->timestamps();
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->primary(['artist_id', 'festival_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_festival');
    }
}
