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
        Schema::create('ownerships', function (Blueprint $table) {
            $table->id();

            //FK from User Table
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->string('shareholder_name',100);
            $table->double('shareholder_percentage',15,2);
            $table->string('shareholder_race',50);
            $table->string('shareholder_religion',50);
            $table->string('shareholder_gender',50);
            $table->string('shareholder_age',10);
            $table->integer('shareholder_no');


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
        Schema::dropIfExists('ownerships');
    }
};
