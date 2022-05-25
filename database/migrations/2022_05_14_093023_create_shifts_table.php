<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('expert_id')->nullable();
            $table->unsignedBigInteger('master_id')->nullable();
            $table->string('change_group')->nullable()->default('0');
            $table->string('change_master')->nullable()->default('0');
            $table->string('change_guid')->nullable()->default('0');
            $table->string('change_title')->nullable()->default('0');
            $table->string('status')->nullable()->default('create');
            $table->string('confirm_expert')->nullable()->default('0');
            $table->string('confirm_master')->nullable()->default('0');
            $table->text('request')->nullable();
            $table->unsignedBigInteger('oldtitle')->nullable();
            $table->unsignedBigInteger('newtitle')->nullable();
            $table->unsignedBigInteger('oldgroup_id')->nullable();
            $table->unsignedBigInteger('newgroup_id')->nullable();
            $table->unsignedBigInteger('oldmaster_id')->nullable();
            $table->unsignedBigInteger('newmaster_id')->nullable();
            $table->unsignedBigInteger('oldguid_id')->nullable();
            $table->unsignedBigInteger('newguid_id')->nullable();

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
        Schema::dropIfExists('shifts');
    }
}
