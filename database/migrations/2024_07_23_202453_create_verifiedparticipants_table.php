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
        Schema::create('verifiedparticipants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('participantId');
            $table->foreign('participantId')->references('participantId')->on('participants');
            $table->integer('chances');
            $table->integer('remainingQuestions');
            $table->time('remainingTime');
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
        Schema::dropIfExists('verifiedparticipants');
    }
};
