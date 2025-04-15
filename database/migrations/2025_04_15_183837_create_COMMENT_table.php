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
        Schema::create('COMMENT', function (Blueprint $table) {
            $table->integer('COMMENT_ID', true);
            $table->string('CONTENTS', 4000);
            $table->timestamp('CREATE_DT')->nullable();
            $table->integer('STATE')->nullable();
            $table->integer('DEPTH')->nullable();
            $table->integer('GROUP_NO')->nullable();
            $table->integer('USER_ID')->nullable()->index('FK_COMMENT_USER');
            $table->integer('BLOG_ID')->nullable()->index('FK_COMMENT_BLOG');
            $table->integer('PARENT_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('COMMENT');
    }
};
