<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $appends = ['intro_text'];

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

    public function getIntroTextAttribute()
    {
        if (strpos($this->article_text, '{{readmore}}') > 0) {
            return explode('{{readmore}}',$this->article_text)[0];
        } else {
            return $this->article_text;
        }
    }

    public static function getAllActiveArticlesByCategory($categoryCode = null)
    {
        if ($categoryCode !== null) {
            $category = Category::getCategoryByCode($categoryCode);
            return Article::where('category_id', $category->id)->where('trash', null)->get();
        } else {
            return Article::where('trash', null)->get();
        }
    }

}
