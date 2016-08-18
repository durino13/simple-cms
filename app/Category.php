<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const JOBS = 1;
    const NEWS = 2;

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
