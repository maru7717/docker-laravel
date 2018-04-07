<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('day')->comment('セッション日');
            $table->time('start_time')->nullable()->comment('開始時間');
            $table->integer('lord_id1')->nullable()->comment('君主1');
            $table->integer('lord_id2')->nullable()->comment('君主2');
            $table->integer('lord_id3')->nullable()->comment('君主3');
            $table->integer('lord_id4')->nullable()->comment('君主4');
            $table->integer('lord_id5')->nullable()->comment('君主5');
            $table->integer('lord_id6')->nullable()->comment('君主6');
            $table->integer('lord_id7')->nullable()->comment('君主7');
            $table->integer('lord_id8')->nullable()->comment('君主8');
            $table->integer('player_id1')->nullable()->comment('プレイヤー1');
            $table->integer('player_id2')->nullable()->comment('プレイヤー2');
            $table->integer('player_id3')->nullable()->comment('プレイヤー3');
            $table->integer('player_id4')->nullable()->comment('プレイヤー4');
            $table->integer('player_id5')->nullable()->comment('プレイヤー5');
            $table->integer('player_id6')->nullable()->comment('プレイヤー6');
            $table->integer('player_id7')->nullable()->comment('プレイヤー7');
            $table->integer('player_id8')->nullable()->comment('プレイヤー8');
            $table->string('end_year')->nullable()->comment('終了年');
            $table->string('result')->nullable()->comment('結果');
            $table->string('report')->nullable()->comment('記録');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE sessions COMMENT 'セッション'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
