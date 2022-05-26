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
        Schema::create('assistance_business_issues', function (Blueprint $table) {
            $table->id();

            //FK from User Table
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->integer('issue1');
            $table->string('issue1_desc',200);
            $table->integer('issue2');
            $table->string('issue2_desc',200);
            $table->integer('issue3');
            $table->string('issue3_desc',200);

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
        Schema::dropIfExists('assistance_business_issues');
    }
};
