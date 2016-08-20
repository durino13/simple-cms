<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const JOBS = 1;
    const NEWS = 2;
    const RIGHT_NEWS = 3;

    protected $table = 'c_category';

    public function articles()
    {
        $this->belongsToMany('App\Article');
    }

    public static function getCategoryByCode($code)
    {
        return Category::where('code', $code)->first();
    }

}
