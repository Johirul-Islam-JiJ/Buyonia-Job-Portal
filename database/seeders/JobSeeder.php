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

        // $job->name = 'Software Engineer';
        // $job->email = 'business@email.com';
        // $job->phone = '01788888888';
        // $job->whatsapp = '+88017877777779';
        // $job->working_hour = '10';
        // $job->address = 'Bangladesh, Dhaka';
        // $job->logo = 'logo.png';
        // $job->favicon = 'fav.png';
        // $job->description = 'Buyonia Limited short description';
        // $job->copyright = '2022';

        $job->save();

    }
}
