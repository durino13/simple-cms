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

    // TODO TinyMCE plugins should be moved into a separate class ..
    public function getIntroTextAttribute()
    {
        if (strpos($this->article_text, '<hr />') > 0) {
            return explode('<hr />',$this->article_text)[0];
        } else {
            return $this->article_text;
        }
    }

    /**
     * Get all articles in a specified category
     * @param null $categoryCode
     * @return mixed
     */
    public static function getAllActiveArticlesByCategory($categoryCode = null)
    {
        if ($categoryCode !== null) {
            $category = Category::getCategoryByCode($categoryCode);
            return Article::where('category_id', $category->id)
                ->where('trash', null)
                ->where('archive',null)
                ->get();
        } else {
            return Article::where('trash', null)
                ->where('archive',null)
                ->orderBy('created_at','desc')->get();
        }
    }

    /**
     * Get articles in the archive
     * @return mixed
     */
    public static function getArchivedArticles()
    {
        return Article::where('archive', 1)->orderBy('created_at','desc')->get();
    }

    /**
     * Get articles in the trash
     * @return mixed
     */
    public static function getTrashArticles()
    {
        return Article::where('trash', 1)->orderBy('created_at','desc')->get();
    }

}
