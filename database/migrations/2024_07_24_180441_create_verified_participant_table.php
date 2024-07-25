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
        Schema::create('verified_participant', function (Blueprint $table) {
             $table->integer('chances')->nullable(false); // Not Null
            $table->integer('remainingQuestions')->nullable(false); // Not Null
            $table->time('remainingTime')->nullable(false); // Not Null
            $table->integer('participantId')->unsigned(); // Foreign Key

            // Foreign Key constraint
            $table->foreign('participantId')->references('id')->on('participants')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verified_participant');
    }
};
