<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('Primary_phone');
            $table->string('Primary_email');
            $table->string('Secondary_phone')->nullable();
            $table->string('Secondary_email')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('religion')->nullable();
            $table->text('career_objective');
            $table->text('career_summary');
            $table->text('special_qualifications')->nullable();
            $table->string('employment_history')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('professional_qualification')->nullable();
            $table->string('projects')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('training_summary')->nullable();
            $table->string('specialization')->nullable();
            $table->string('extra_curricular')->nullable();
            $table->string('language_skills')->nullable();
            $table->string('looking_for')->nullable();
            $table->string('available_for')->nullable();
            $table->string('preferred_job_category')->nullable();
            $table->string('preferred_job_location')->nullable();
            $table->string('git')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('portfolio')->nullable();
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
        Schema::dropIfExists('resumes');
    }
}
