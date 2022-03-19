<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('master_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('type');
            $table->string('title');
            $table->string('en_title');
            $table->string('en_tags',700);
            $table->string('tags',700);
            $table->text('problem');
            $table->text('necessity');
            $table->text('question');
            $table->text('sub_question');
            $table->text('hypo');
            $table->text('theory');
            $table->text('structure');
            $table->text('method');
            $table->text('source');
            $table->string('status',256)->nullable();
            $table->string('side',5)->nullable()->default(1);
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
        Schema::dropIfExists('plans');
    }
}
