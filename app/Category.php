<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';

    public function articles()
    {
        $this->belongsToMany('App\Article');
    }

    public static function getCategoryByCode($code)
    {
        return Category::where('code', $code)->first();
    }

}
