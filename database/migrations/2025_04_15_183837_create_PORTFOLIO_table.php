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
        Schema::create('PORTFOLIO', function (Blueprint $table) {
            $table->integer('PORTFOLIO_ID', true);
            $table->integer('USER_ID')->nullable()->index('USER_ID');
            $table->string('TITLE', 100)->nullable();
            $table->text('DESCRIPTION')->nullable();
            $table->string('CATEGORY', 20)->nullable();
            $table->string('PROJECT_URL', 1024)->nullable();
            $table->date('CREATED_AT')->nullable();
            $table->string('IMAGE_URL', 1024)->nullable();
            $table->integer('LIKE_COUNT')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PORTFOLIO');
    }
};
