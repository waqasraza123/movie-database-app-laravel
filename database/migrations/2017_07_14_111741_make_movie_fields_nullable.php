<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeMovieFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->increments('id')->unique()->change();
            $table->string('aka_title')->nullable()->change();
            $table->string('plot')->nullable()->change();
            $table->text('synopsis')->nullable()->change();
            $table->date('release_date')->nullable()->change();
            $table->string('background_path')->nullable()->change();
            $table->bigInteger('runtime')->nullable()->change();
            $table->string('age_rating')->nullable()->change();
            $table->bigInteger('views')->nullable()->change();
            $table->string('homepage')->nullable()->change();
            $table->integer('featured')->nullable()->change();
            $table->string('stream_url')->nullable()->change();
            $table->string('buy_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            //
        });
    }
}
