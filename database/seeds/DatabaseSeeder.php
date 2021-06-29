<?php

use App\Settings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class ,SettingsTableSeeder:: class);// n'oublier pas de presiser le seeder qui va s'executer 
    }
}
