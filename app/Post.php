<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable=['title','content','category_id','featured','slug']; // pour presiser les chap a modifier leure dune upldate
    public function category()
    {

        // NB: dima fach kankhdmo  b belongsto katkon function singulier hiit (1.1)
        return $this->belongsTo(Category :: class);
    }
}
