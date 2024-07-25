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
        Schema::create('attempts', function (Blueprint $table) {
            $table->increments('attemptId'); // Primary Key
            $table->integer('participantId')->unsigned(); // Foreign Key
            $table->string('challengeId', 20); // Foreign Key
            $table->integer('score')->nullable(false); // Not Null
            $table->integer('timeTaken')->nullable(false); // Not Null

            // Foreign Key constraints
            $table->foreign('participantId')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('challengeId')->references('challengeId')->on('challenges')->onDelete('cascade');

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
        Schema::dropIfExists('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attempts');
    }
};
