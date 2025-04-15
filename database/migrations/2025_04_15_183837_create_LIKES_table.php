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
        Schema::create('LIKES', function (Blueprint $table) {
            $table->integer('LIKE_ID', true);
            $table->integer('PORTFOLIO_ID')->nullable()->index('PORTFOLIO_ID');
            $table->integer('USER_ID')->nullable()->index('USER_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LIKES');
    }
};
