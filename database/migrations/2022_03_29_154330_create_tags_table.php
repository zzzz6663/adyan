<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tag')->nullable();
            $table->timestamps();
        });

        Schema::create('subject_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            // $table->foreign('subject_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            // $table->foreign('tag_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->primary(['subject_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_tag');
        Schema::dropIfExists('tags');
    }
}
