<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  instentation d'un object user 

      App\Settings::create([ 
            'site_name' => 'www.mybloge.com',
            'contact_number' => '0606060606',
            'contact_email' => Str::random(10).'@gmail.com',
            'address'  =>'88 lotisment test rue test '
          ]);


    }
}
