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

            $table->string('issue', 20);
            $table->integer('issue_priority');
            $table->string('issue_desc',200)->nullable();
            

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
