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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();

            //FK from User Table
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->integer('financial_year');
            $table->double('financial_revenue',15,2);
            $table->double('financial_expenses',15,2);

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
        Schema::dropIfExists('financials');
    }
};
