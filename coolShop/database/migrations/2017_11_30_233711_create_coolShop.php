<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoolShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->mediumText('question');
            $table->unsignedInteger('itm_id');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('answer');
            $table->unsignedInteger('question_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');

        Schema::dropIfExists('questions');

        Schema::dropIfExists('answers');
    }
}
