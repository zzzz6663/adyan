<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelBetweenCurtTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curt_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('curt_id');
            // $table->foreign('curt_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            // $table->foreign('tag_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->primary(['curt_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curt_tag');
    }
}
