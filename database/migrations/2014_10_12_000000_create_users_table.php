<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',256);
            $table->string('family',256);
            $table->string('code',256)->unique();
            $table->string('level',50)->nullable();
            $table->string('avatar')->nullable();
            $table->string('group');
            $table->string('whatsapp',20);
            $table->string('mobile',20)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('type_job',50);
            $table->string('semat_job',50);
            $table->string('job',50)->nullable();
            $table->string('org',50)->nullable();
            $table->unsignedBigInteger('country_id');
            $table->string('city',50);
            $table->string('province',50);
            $table->string('status',250)->nullable();
            $table->string('verify')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('course');
            $table->string('expert');
            $table->string('master_univer')->nullable();
            $table->string('master_course')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
