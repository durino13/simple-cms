<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'd_article';

    protected $appends = ['intro_text'];

    /*
     * Relation definitions ...
     */

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'r_article_category');
    }

    /*
     * Accessor definitions
     */

    /**
     * Returns the portion of article_text before READMORE placeholder
     * @return mixed
     */
    public function getIntroTextAttribute()
    {
        if (strpos($this->article_text, config('javascript.tinymce.readmore')) > 0) {
            return explode('<p>'.config('javascript.tinymce.readmore').'</p>',$this->article_text)[0];
        } else {
            return $this->article_text;
        }
    }

    /**
     * Returns the full article text without the placeholders such as 'READMORE'
     * @return mixed Remove readmore text from the string ..
     */
    public function getArticleTextParsedAttribute()
    {
        return str_replace(config('javascript.tinymce.readmore'),'', $this->article_text);
    }

    /*
     * Model methods
     */

    /**
     * Get all articles in a specified category
     * @param null $categoryCode
     * @return mixed
     */
    // TODO $categoryId should be a collection ..
    public static function getArticles(int $categoryId = null, int $statusID = 2, int $isTrash = 0, int $isArchive = 0)
    {
        $result = \DB::table('d_article')
            ->leftJoin('r_article_category', 'd_article.id', '=', 'r_article_category.article_id');

        if (!empty($categoryId)) {
            $result->where('r_article_category.category_id', '=', $categoryId);
        }

        if (!empty($statusID)) {
            $result->where('status_id', '=', $statusID);
        }

//        $result->where('trash' ,'=', $isTrash)
//            ->where('archive' ,'=', $isArchive)
//            ->orderBy('start_publishing', 'desc');
//
//        var_dump($result->toSql());
//        exit();

        return Article::hydrate(
            $result->where('trash' ,'=', $isTrash)
                    ->where('archive' ,'=', $isArchive)
                    ->orderBy('start_publishing', 'desc')->get()
        );
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
