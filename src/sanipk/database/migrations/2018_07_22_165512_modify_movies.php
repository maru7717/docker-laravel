<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // カラム追加
        Schema::table('movies', function (Blueprint $table) {
            $table->string('thumbnail_url')->after('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // カラム削除
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumns('thumbnail_url');
        });
    }
}
