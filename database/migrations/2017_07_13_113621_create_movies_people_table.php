<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesPeopleTable extends Migration {

	public function up()
	{
		Schema::create('movies_people', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('movie_id')->unsigned();
			$table->integer('person_id')->unsigned();
			$table->string('character');
			$table->tinyInteger('known_for');
			$table->integer('job_id')->unsigned();
			$table->integer('position');
			$table->string('note');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('movies_people');
	}
}