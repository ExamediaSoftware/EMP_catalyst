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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            
            //FK for User Table
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('company_name');
            $table->string('business_reg_no');
            $table->string('business_reg_year');
            $table->integer('company_type');
            $table->integer('sector_type');
            $table->string('business_desc',255);
            $table->string('address_line1',255);
            $table->string('address_line2',255);
            $table->string('postcode',255);
            $table->string('city',255);
            $table->string('state',255);
            $table->integer('office_number');
            $table->integer('fax_number');
            $table->integer('acknowledgement');

            //FK on USERS
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

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
        Schema::dropIfExists('applications');
    }
};
