<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel_id');
            $table->string('video_id');
            $table->dateTimeTz('published_at');
            $table->string('duration');
            $table->integer('player_id');
            $table->integer('session_id')->nullable();;
            $table->timestamps();
        });

        DB::statement("ALTER TABLE movies COMMENT '動画'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
