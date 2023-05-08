<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new Job();
        $job->department_id = '1';
        $job->designation = 'IT Executives';
        $job->title = 'Software Engineer';
        $job->description = 'We need an web developer with in hand working experienced in Software Company and several Projects';
        $job->salary = '25000';
        $job->location = 'Dhaka';
        $job->type = 'Full Time';
        $job->qualification = 'BSc in CSE,SWE,CE and equivalent Degree from  Reputed University';
        $job->experience = '2 Years';
        $job->working_hours = '10:00 AM - 5:00 PM';
        $job->Weekend = 'Friday to Sunday';
        $job->vacancy = '08';
        $job->application_deadline = '2023-06-30';
        $job->application_link = 'https: //docs.google.com/forms/u/0/d/1d76oIOHOcIi3CDvnH-
        SHsuuNNwllLKInQmMPzwU8P0M/edit?ntd=1&usp=forms_home&ths=true';
        $job->how_to_apply = 'Read The Given Instruction carefully';
        $job->job_category = 'Information Technology';
        $job->job_level = 'Entry';
        $job->job_nature = 'Remote';
        $job->employment_status = 'Unemployed';
        $job->company_name = 'Buyonia Bangladesh Limited';
        $job->company_website = 'https: //buyoniasoft.com/';
        $job->company_email = 'info@buyoniasoft.com';
        $job->company_phone = '+8809610001012';
        $job->company_address = '186 Perth Road, Barking IG11 7UD, United kingdom';

        $job->save();

    }
}
