<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('master_id')->nullable();
            $table->unsignedBigInteger('ostad_id')->nullable();
            $table->string('title');
            $table->text('problem');
            $table->text('question');
            $table->text('necessity');
            $table->string('status',256)->nullable();
            $table->string('innovation',400);
            $table->string('tags',700);
            $table->string('side',5)->nullable()->default(1);
            $table->string('ostad',250)->nullable();
            $table->string('resume',250)->nullable();
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
        Schema::dropIfExists('curts');
    }
}
