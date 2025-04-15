<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USER', function (Blueprint $table) {
            $table->integer('USER_ID', true);
            $table->string('EMAIL', 100)->unique('EMAIL');
            $table->string('AVATAR', 100)->nullable();
            $table->string('PW', 64)->nullable();
            $table->integer('USER_TYPE')->nullable();
            $table->string('FIRST_NAME', 100)->nullable();
            $table->string('LAST_NAME', 100)->nullable();
            $table->integer('REGISTER_TYPE')->nullable();
            $table->dateTime('REGISTER_DT')->nullable();
            $table->string('ADDRESS', 100)->nullable();
            $table->string('PHONE_NUM', 20)->nullable();
            $table->string('BIO', 300)->nullable();
            $table->string('JOB_TITLE', 100)->nullable();
            $table->date('BIRTHDAY')->nullable();
            $table->string('INSTAGRAM_URL', 100)->nullable();
            $table->string('LINKEDIN_URL', 100)->nullable();
            $table->string('GITHUB_URL', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USER');
    }
};
