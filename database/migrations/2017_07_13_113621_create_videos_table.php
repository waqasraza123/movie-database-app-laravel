<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('type');
			$table->string('quality');
			$table->string('video_key');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}