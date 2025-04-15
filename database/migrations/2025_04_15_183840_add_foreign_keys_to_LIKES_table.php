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
        Schema::table('LIKES', function (Blueprint $table) {
            $table->foreign(['PORTFOLIO_ID'], 'likes_ibfk_1')->references(['PORTFOLIO_ID'])->on('PORTFOLIO')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['USER_ID'], 'likes_ibfk_2')->references(['USER_ID'])->on('USER')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('LIKES', function (Blueprint $table) {
            $table->dropForeign('likes_ibfk_1');
            $table->dropForeign('likes_ibfk_2');
        });
    }
};
