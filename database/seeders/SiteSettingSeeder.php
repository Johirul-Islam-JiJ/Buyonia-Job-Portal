<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new SiteSetting();

        $setting->name = 'Buyonia';
        $setting->email = 'business@email.com';
        $setting->phone = '01788888888';
        $setting->whatsapp = '+88017877777779';
        $setting->working_hour = '10';
        $setting->address = 'Bangladesh, Dhaka';
        $setting->logo = 'logo.png';
        $setting->favicon = 'fav.png';
        $setting->description = 'Buyonia Limited short description';
        $setting->copyright = '2022';


        $setting->save();
    }
}
