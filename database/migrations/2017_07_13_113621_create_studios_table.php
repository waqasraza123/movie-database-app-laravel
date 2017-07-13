<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudiosTable extends Migration {

	public function up()
	{
		Schema::create('studios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('founders');
			$table->string('homepage');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('studios');
	}
}