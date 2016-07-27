<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';

    public static function getCategoryByCode($code)
    {
        return Category::where('code', $code)->first();
    }

}
