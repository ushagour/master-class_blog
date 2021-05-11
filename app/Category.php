<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;
    public function Posts()
    {
        // nb: hena 3dna hasMany y3niii (1.n) dakchii lach smiina function plurel 
          return $this->hasMany(Category::class);
    }
}
