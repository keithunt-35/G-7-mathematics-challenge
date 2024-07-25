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
        Schema::create('participants', function (Blueprint $table) {            
            $table->unsignedInteger('participantId')->primary();
            $table->date('dateOfBirth');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('password');
            $table->string('username');
            $table->string('email');
            $table->unsignedInteger('schoolId');
            $table->foreign('schoolId')->references('schoolId')->on('schools');
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
        Schema::dropIfExists('participants');
    }
};
