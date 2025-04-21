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
        Schema::create('BLOG', function (Blueprint $table) {
            $table->integer('BLOG_ID', true);
            $table->string('TITLE', 1000);
            $table->text('CONTENTS')->nullable();
            $table->integer('USER_ID')->index('FK_BLOG_USER');
            $table->timestamp('CREATED_AT')->nullable();//created_dt
            $table->timestamp('UPDATED_AT')->nullable();// was MODIFY_DT
            $table->string('IMAGE_URL', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BLOG');
    }
};
