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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reportId', 20)->primary();
            $table->bigInteger('participantId', 20);
            $table->string('challengeId', 20);
            
            $table->timestamps();
            $table->foreign('participantId')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('challengeId')->references('id')->on('challenges')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
