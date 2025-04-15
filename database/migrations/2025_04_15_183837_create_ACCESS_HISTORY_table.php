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
        Schema::create('ACCESS_HISTORY', function (Blueprint $table) {
            $table->integer('ACCESS_HISTORY_NO')->primary();
            $table->string('EMAIL', 100)->nullable()->index('FK_ACCESS_HISTORY_USER');
            $table->string('IP', 50)->nullable();
            $table->string('SESSION_ID', 32)->nullable();
            $table->date('SIGNIN_DT')->nullable();
            $table->date('SIGNOUT_DT')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ACCESS_HISTORY');
    }
};
