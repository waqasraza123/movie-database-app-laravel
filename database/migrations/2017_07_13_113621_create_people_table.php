<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	public function up()
	{
		Schema::create('people', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('nickname');
			$table->string('photo_path');
			$table->date('birth_date');
			$table->string('birth_place');
			$table->string('gender');
			$table->text('biography');
			$table->string('official_site');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('instagram');
			$table->bigInteger('views');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('people');
	}
}