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
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('company_name')->nullable();
            $table->string('business_reg_no')->nullable();
            $table->string('business_reg_year')->nullable();
            $table->integer('company_type')->nullable();
            $table->integer('sector_type')->nullable();
            $table->string('business_desc',255)->nullable();
            $table->string('address_line1',255)->nullable();
            $table->string('address_line2',255)->nullable();
            $table->string('postcode',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->integer('office_number')->nullable();
            $table->integer('fax_number')->nullable();
            $table->integer('acknowledgement')->nullable();

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
