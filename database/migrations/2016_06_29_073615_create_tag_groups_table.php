<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagGroupsTable extends Migration {

	public function up()
	{
		Schema::create('tagging_tag_groups', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug', 154)->index();
			$table->string('name', 154);
		});
	}

	public function down()
	{
		Schema::drop('tagging_tag_groups');
	}
}
