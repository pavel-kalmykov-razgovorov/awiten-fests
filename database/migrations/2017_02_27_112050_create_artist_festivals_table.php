<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_festivals', function (Blueprint $table) {
            $table->integer('artist_id');
            $table->integer('festival_id');
            $table->foreign('artist_id')->references('id')->on('festivals')->onDelete('set null');
            $table->foreign('festival_id')->references('id')->on('artists')->onDelete('set null');
            $table->primary(['artist_id', 'festival_id']);
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
        Schema::dropIfExists('artist_festivals');
    }
}
