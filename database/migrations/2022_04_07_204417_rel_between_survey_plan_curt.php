<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelBetweenSurveyPlanCurt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_survey', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id');
            // $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('survey_id');
            // $table->foreign('survey_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->primary(['plan_id','survey_id']);
        });
        Schema::create('curt_survey', function (Blueprint $table) {
            $table->unsignedBigInteger('curt_id');
            // $table->foreign('curt_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('survey_id');
            // $table->foreign('survey_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->primary(['curt_id','survey_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_survey');
        Schema::dropIfExists('curt_survey');
    }
}
