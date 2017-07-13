<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeywordsMoviesTable extends Migration {

	public function up()
	{
		Schema::create('keywords_movies', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('keyword_id')->unsigned();
			$table->integer('movie_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('keywords_movies');
	}
}