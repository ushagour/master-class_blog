<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    public function category()
    {

        // NB: dima fach kankhdmo  b belongsto katkon function singulier hiit (1.1)
        return $this->belongsTo(Category :: class);
    }
}
