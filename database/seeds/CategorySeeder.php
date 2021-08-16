<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
            # code...
            Category::create([ 
                'name' => Str::random(10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
              ]);
        }



    }
}
