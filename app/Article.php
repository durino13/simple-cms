<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'd_article';

    protected $appends = ['intro_text'];

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
    // TODO $categoryId should be a collection ..
    public static function getArticles(int $categoryId = null, int $statusID = Status::ACTIVE_ID, int $isTrash = 0, int $isArchive = 0)
    {
        $result = \DB::table('d_article')
            ->join('r_article_category', 'd_article.id', '=', 'r_article_category.article_id');

        if (!empty($categoryId)) {
            $result->where('r_article_category.category_id', '=', $categoryId);
        }

        return Article::hydrate(

            $result->where('trash' ,'=', $isTrash)
                    ->where('archive' ,'=', $isArchive)
                    ->WHERE('status_id', '=', $statusID)
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
