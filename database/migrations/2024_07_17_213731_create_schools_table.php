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
        Schema::create('schools', function (Blueprint $table) {            
            $table->increments('schoolId'); // Primary Key
            $table->string('district', 20)->nullable(false); // Not Null
            $table->string('email', 30)->nullable(false); // Not Null
            $table->string('name', 25)->nullable(false); // Not Null
            $table->string('representativeName', 25)->nullable(false); // Not Null
            $table->string('registrationNo', 20)->unique(); // Alternate Key

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
};
