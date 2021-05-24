<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder create random user
        // methode crete dyal class user pour cree un nouveau utilisteur! 
        $user=  App\User::create([ 
        'name' => Str::random(10),
        'email' => Str::random(10).'@gmail.com',
        'password' => Hash::make('password'),
        'is_admin'  =>1
      ]);
      // insetion by quiry builder

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'is_admin'  =>1
        // ]);
        DB::table('profiles')->insert([
            'avatar' => 'link to img',
            'about' =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, dignissimos quisquam molestiae consequuntur dicta eveniet voluptate incidunt quo ullam cupiditate, odit natus ducimus ad, aut totam deserunt illum repellendus? Quidem.',
            'facebook' => 'link to img',
            'youtube' => 'link to img',
            'user_id' => $user->id,
        ]);
    }
}