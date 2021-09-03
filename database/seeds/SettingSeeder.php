<?php

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
        //
        
      App\Setting::create([ 
        'site_name' => 'mybloge',
        'contact_number' => '0606060606',
        'contact_email' => Str::random(10).'@gmail.com',
        'address'  =>'88 lotisment test rue test ',
        'about'  =>'This company was founded on the belief that education is for everyone. We have committed $2,000,000 in funding towards creating content that inspires and educates in practices for social justice and against systemic racism. This programming will be freely available.',
        'jourheureOfappel'  =>'7j/7j  24H/24h',
        'City'  =>'Rabat',
        'country'  =>'Morocco'
      ]);

    }
}
