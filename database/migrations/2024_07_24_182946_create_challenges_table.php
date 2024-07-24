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
        Schema::create('_challenges', function (Blueprint $table) {            
            
            $table->integer('challengeId')->primary();
            $table->integer('duration')->nullable(false);
            $table->string('name',25)->nullable(false);
            $table->date('startDate')->nullable(false);
            $table->date('endDate')->nullable(false);
            $table->integer('noOfQuestions')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_challenges');
    }
};
