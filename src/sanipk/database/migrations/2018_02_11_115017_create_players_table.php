<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chocoa_nickname')->comment('CHOCOAニックネーム');
            $table->string('chocoa_real_name')->comment('名前');
            $table->string('chocoa_user_id')->comment('CHOCOA_UserID');
            $table->string('host')->comment('接続元ホスト');
            $table->string('youtube_channel')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE players COMMENT 'プレイヤー'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
