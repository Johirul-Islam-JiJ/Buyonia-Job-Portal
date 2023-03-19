<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('salary');
            $table->string('location');
            $table->string('type');
            $table->string('qualification');
            $table->string('experience');
            $table->date('application_deadline');
            $table->string('application_link');
            $table->text('how_to_apply');
            $table->string('job_category');
            $table->string('job_level');
            $table->string('job_nature');
            $table->string('employment_status');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('company_address');
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
