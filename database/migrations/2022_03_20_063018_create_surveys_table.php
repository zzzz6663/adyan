<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('curt_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();

            $table->timestamps();

        });
        Schema::create('survey_user', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_id');
            // $table->foreign('survey_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->string('info')->nullable();
            $table->timestamp('time')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['survey_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_user');
        Schema::dropIfExists('surveys');
    }
}
