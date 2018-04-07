<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('display_order');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE lords COMMENT '君主'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lords');
    }
}
