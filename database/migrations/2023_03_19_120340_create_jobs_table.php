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
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');
            $table->string('designation');
            $table->string('title');
            $table->text('description');
            $table->string('salary')->nullable();
            $table->string('location');
            $table->string('type')->nullable();
            $table->string('qualification');
            $table->string('experience')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('Weekend')->nullable();
            $table->date('application_deadline');
            $table->string('application_link')->nullable();
            $table->string('vacancy')->nullable();
            $table->text('how_to_apply')->nullable();
            $table->string('job_category')->nullable();
            $table->string('job_level')->nullable();
            $table->string('job_nature')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('company_name');
            $table->string('company_website')->nullable();
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
