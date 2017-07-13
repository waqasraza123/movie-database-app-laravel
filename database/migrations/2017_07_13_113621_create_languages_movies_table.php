<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesMoviesTable extends Migration {

	public function up()
	{
		Schema::create('languages_movies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('language_id')->unsigned();
			$table->integer('movie_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('languages_movies');
	}
}