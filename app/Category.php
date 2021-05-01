<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function Posts()
    {
        // nb: hena 3dna hasMany y3niii (1.n) dakchii lach smiina function plurel 
          return $this->hasMany(Category::class);
    }
}
