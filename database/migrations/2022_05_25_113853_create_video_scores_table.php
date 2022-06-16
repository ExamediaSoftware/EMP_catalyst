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
        Schema::create('video_scores', function (Blueprint $table) {
            $table->id();

            //FK from applications Table
             $table->bigInteger('application_id')->unsigned()->nullable();
             $table->foreign('application_id')->references('id')->on('applications');
             $table->integer('application_status_id');
            
             $table->double('video_score',4,2);
             //FK for User Table
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

             

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
        Schema::dropIfExists('video_scores');
    }
};
