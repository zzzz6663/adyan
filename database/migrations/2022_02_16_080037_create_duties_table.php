<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->string('type')->nullable();
            $table->text('info')->nullable();
            $table->unsignedBigInteger('down_id')->nullable();
            $table->timestamp('time')->nullable();
            $table->timestamps();
        });
        Schema::create('duty_user', function (Blueprint $table) {
            $table->unsignedBigInteger('duty_id');
            // $table->foreign('duty_id')->references('id')->on('dutys')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['duty_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duties');
    }
}
