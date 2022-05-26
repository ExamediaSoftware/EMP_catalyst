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
        Schema::create('media', function (Blueprint $table) {
            $table->id();

             //FK from User Table
             $table->bigInteger('application_id')->unsigned()->nullable();
             $table->foreign('application_id')->references('id')->on('applications');
 
             $table->string('media_path',200);
             $table->string('media_name',200);
             $table->string('media_type',50);


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
        Schema::dropIfExists('media');
    }
};
