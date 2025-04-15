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
        Schema::table('COMMENT', function (Blueprint $table) {
            $table->foreign(['BLOG_ID'], 'FK_COMMENT_BLOG')->references(['BLOG_ID'])->on('BLOG')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['USER_ID'], 'FK_COMMENT_USER')->references(['USER_ID'])->on('USER')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('COMMENT', function (Blueprint $table) {
            $table->dropForeign('FK_COMMENT_BLOG');
            $table->dropForeign('FK_COMMENT_USER');
        });
    }
};
