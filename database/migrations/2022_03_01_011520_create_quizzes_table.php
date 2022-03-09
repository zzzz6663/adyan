<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('duration')->nullable();
            $table->string('active')->default('0')->nullable();

            $table->timestamps();
        });

        Schema::create('quiz_user', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_id');
            // $table->foreign('quiz_id')->references('id')->on('quizs')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('number');
            $table->string('result')->default('0')->nullable();
            $table->timestamp('time')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->primary(['quiz_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_user');
        Schema::dropIfExists('quizzes');
    }
}
