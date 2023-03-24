<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs')->cascadeOnDelete();
            $table->string('name');
            $table->string('image');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('present_address');
            $table->string('education_level');
            $table->string('portfolio');
            $table->string('cover_letter');
            $table->string('resume');
            $table->string('expected_salary');
            $table->string('current_salary');
            $table->string('notes');
            $table->string('github');
            $table->string('linkdin');
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
        Schema::dropIfExists('job_applications');
    }
}
