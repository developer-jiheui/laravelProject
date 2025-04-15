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
        Schema::table('BLOG', function (Blueprint $table) {
            $table->foreign(['USER_ID'], 'FK_BLOG_USER')->references(['USER_ID'])->on('USER')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('BLOG', function (Blueprint $table) {
            $table->dropForeign('FK_BLOG_USER');
        });
    }
};
