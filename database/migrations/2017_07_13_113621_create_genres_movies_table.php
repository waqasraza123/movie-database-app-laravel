<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGenresMoviesTable extends Migration {

	public function up()
	{
		Schema::create('genres_movies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('genre_id')->unsigned();
			$table->integer('movie_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('genres_movies');
	}
}