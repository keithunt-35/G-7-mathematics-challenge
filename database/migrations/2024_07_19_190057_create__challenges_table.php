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
            $table->timestamps();
            $table->integer('challengeId')->primary();
            $table->integer('duration');
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('noOfQuestions');
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
