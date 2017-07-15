<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAgeRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('age_rating', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->unsignedInteger('rating_id');
        });

        Schema::rename('age_rating', 'age_rating_movies');
        Schema::create('age_ratings', function (Blueprint $table){
            $table->increments('id');
            $table->string('age_rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('age_rating', function (Blueprint $table) {
            //
        });
    }
}
