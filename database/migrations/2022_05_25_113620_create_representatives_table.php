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
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();

            //FK from User Table
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->string('rep_name',100);
            $table->string('rep_position',50);
            $table->integer('rep_age');
            $table->string('rep_email',50);
            $table->integer('rep_phone');
            $table->string('rep_as', 20)->nullable();

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
        Schema::dropIfExists('representatives');
    }
};
