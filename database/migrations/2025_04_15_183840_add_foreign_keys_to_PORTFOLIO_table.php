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
        Schema::table('PORTFOLIO', function (Blueprint $table) {
            $table->foreign(['USER_ID'], 'portfolio_ibfk_1')->references(['USER_ID'])->on('USER')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PORTFOLIO', function (Blueprint $table) {
            $table->dropForeign('portfolio_ibfk_1');
        });
    }
};
