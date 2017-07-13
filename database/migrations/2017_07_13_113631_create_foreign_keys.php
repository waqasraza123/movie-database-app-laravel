<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('genres_movies', function(Blueprint $table) {
			$table->foreign('genre_id')->references('id')->on('genres')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('genres_movies', function(Blueprint $table) {
			$table->foreign('movie_id')->references('id')->on('movies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->foreign('movie_id')->references('id')->on('movies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->foreign('person_id')->references('id')->on('people')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->foreign('job_id')->references('id')->on('jobs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('keywords_movies', function(Blueprint $table) {
			$table->foreign('keyword_id')->references('id')->on('keywords')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('keywords_movies', function(Blueprint $table) {
			$table->foreign('movie_id')->references('id')->on('movies')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('languages_movies', function(Blueprint $table) {
			$table->foreign('language_id')->references('id')->on('languages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('languages_movies', function(Blueprint $table) {
			$table->foreign('movie_id')->references('id')->on('movies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('movies', function(Blueprint $table) {
			$table->dropForeign('movies_language_id_foreign');
		});
		Schema::table('genres_movies', function(Blueprint $table) {
			$table->dropForeign('genres_movies_genre_id_foreign');
		});
		Schema::table('genres_movies', function(Blueprint $table) {
			$table->dropForeign('genres_movies_movie_id_foreign');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->dropForeign('movies_people_movie_id_foreign');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->dropForeign('movies_people_person_id_foreign');
		});
		Schema::table('movies_people', function(Blueprint $table) {
			$table->dropForeign('movies_people_job_id_foreign');
		});
		Schema::table('keywords_movies', function(Blueprint $table) {
			$table->dropForeign('keywords_movies_keyword_id_foreign');
		});
		Schema::table('keywords_movies', function(Blueprint $table) {
			$table->dropForeign('keywords_movies_movie_id_foreign');
		});
		Schema::table('languages_movies', function(Blueprint $table) {
			$table->dropForeign('languages_movies_language_id_foreign');
		});
		Schema::table('languages_movies', function(Blueprint $table) {
			$table->dropForeign('languages_movies_movie_id_foreign');
		});
	}
}