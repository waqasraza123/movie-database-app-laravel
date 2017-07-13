<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesTable extends Migration {

	public function up()
	{
		Schema::create('movies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('aka_title');
			$table->string('plot');
			$table->text('synopsis');
			$table->date('release_date');
			$table->string('poster_path');
			$table->string('background_path');
			$table->integer('language_id')->unsigned();
			$table->bigInteger('runtime');
			$table->string('age_rating');
			$table->bigInteger('views');
			$table->string('homepage');
			$table->tinyInteger('featured');
			$table->string('stream_url');
			$table->string('buy_url');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('movies');
	}
}