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
        Schema::table('ACCESS_HISTORY', function (Blueprint $table) {
            $table->foreign(['EMAIL'], 'FK_ACCESS_HISTORY_USER')->references(['EMAIL'])->on('USER')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ACCESS_HISTORY', function (Blueprint $table) {
            $table->dropForeign('FK_ACCESS_HISTORY_USER');
        });
    }
};
