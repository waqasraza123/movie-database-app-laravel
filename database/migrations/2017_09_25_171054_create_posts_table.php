<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $t){
            $t->increments('id');
            $t->unsignedInteger('user_id');
            $t->string('title');
            $t->text('summary')->nullable();
            $t->longText('body')->nullable();
            $t->string('image')->nullable();
            $t->string('slug')->nullable();
            $t->bigInteger('views')->default(0);
            $t->boolean('is_draft')->default(false);
            $t->timestamps();
            $t->softDeletes();
        });

        Schema::create('categories', function (Blueprint $t){
            $t->increments('id');
            $t->string('name');
            $t->string('slug');
            $t->text('description')->nullable();
            $t->timestamps();
        });


        Schema::create('category_posts', function (Blueprint $t){
            $t->increments('id');
            $t->unsignedInteger('category_id');
            $t->unsignedInteger('post_id');
            $t->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
