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
        'address'  =>'88 lotisment test rue test '
      ]);

    }
}
