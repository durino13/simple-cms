<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

}
