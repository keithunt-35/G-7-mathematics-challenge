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

        Schema::create('challenges', function (Blueprint $table) {            
            $table->unsignedInteger('challengeId')->primary();
            $table->integer('duration');
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('noOfQuestions');            
            $table->timestamps();

                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
};
