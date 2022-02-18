<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->string('type')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });
        Schema::create('log_user', function (Blueprint $table) {
            $table->unsignedBigInteger('log_id');
            // $table->foreign('log_id')->references('id')->on('logs')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['log_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_user');
        Schema::dropIfExists('logs');
    }
}
