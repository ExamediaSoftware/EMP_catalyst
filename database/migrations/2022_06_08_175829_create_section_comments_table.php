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
        Schema::create('section_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->bigInteger('application_status_id')->unsigned();
            $table->foreign('application_status_id')->references('id')->on('application_statuses');
            // $table->foreignId('application_status_id')->references('id')->on('application_statuses');
            $table->string('section',50);
            $table->string('comment',100);
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
        Schema::dropIfExists('section_comments');
    }
};
