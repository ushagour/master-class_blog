<?php

use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <10 ; $i++) {
            Tag::create([
            'tag' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]);
        }

    }
}
