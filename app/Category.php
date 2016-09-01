<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const JOBS = 1;
    const PROJECTS_ACTIVITIES = 2;
    const RIGHT_NEWS = 3;
    const BLOG = 4;

    protected $table = 'c_category';

    public function articles()
    {
        $this->belongsToMany('App\Article', 'r_article_category');
    }

    public static function getCategoryByCode($code)
    {
        return Category::where('code', $code)->first();
    }

}
