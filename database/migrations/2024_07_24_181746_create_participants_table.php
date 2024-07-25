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
           
           $table->bigIncrements('id');
            $table->date('date_of_birth');
            $table->string('email', 30);
            $table->string('first_name', 12);
            $table->string('last_name', 12);
            $table->string('username', 15);
            $table->string('password', 10);
            $table->bigInteger('school_id')->unsigned();
            
            $table->foreign('school_id')->references('schoolId')->on('schools')->onDelete('cascade');
        
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
