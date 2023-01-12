<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'name'  => 'widget_width ',
                'value' => '340',
            ],
            [
                'name'  => 'widget_height ',
                'value' => '300',
            ],
            [
                'name'  => 'youtube_link ',
                'value' => 'https://www.youtube.com/embed/x8zFL-0rBAw',
            ],
            [
                'name'  => 'maps_location ',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.4607731285164!2d115.34714272713963!3d-8.45449166833024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd219be03f95e69%3A0xfc79fa9670193ee2!2sBali%20Provincial%20Mental%20Hospital!5e0!3m2!1sen!2sid!4v1673401649705!5m2!1sen!2sid',
            ],
        ]);
    }
}
