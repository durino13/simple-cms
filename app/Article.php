<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\ITrashable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model implements ITrashable
{

    use SoftDeletes;

    protected $table = 'd_article';

    protected $appends = ['intro_text'];

    protected $dates = ['deleted_at'];

    /*************************************************************
     * Relations
     *************************************************************/

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

    /*************************************************************
     * Accessor definitions
     *************************************************************/

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

    /*************************************************************
     * Model methods
     *************************************************************/

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

        if ($isTrash) {
            $result->whereNotNull('deleted_at');
        } else {
            $result->whereNull('deleted_at');
        }

//        var_dump($result->where('archive' ,'=', $isArchive)
//            ->orderBy('start_publishing', 'desc')->toSql());
//        exit;

        $result->where('archive' ,'=', $isArchive)
            ->orderBy('start_publishing', 'desc');

        return Article::hydrate($result->get()->toArray());

//        ($isTrash) ? $result =  $result->withTrashed()->get() : $result =  $result->onlyTrashed()->get();
//            $result->where('trash' ,'=', $isTrash)
//                    ->where('archive' ,'=', $isArchive)
//                    ->orderBy('start_publishing', 'desc')->get()
        //);
    }

    /**
     * Get articles in the archive
     * @return mixed
     */
    public static function getArchivedArticles()
    {
        return Article::where('archive', 1)->orderBy('created_at','desc')->get();
    }



    // TODO Ako sa robi archivacia? Pouzivam este stlpce 'archived', 'trash'? Robim predsa softdelete, takze ak nepouzivam
    // stlpec trash, musim ho zmazat z DB



    /*************************************************************
     * Trash interface implementations
     *************************************************************/

    /**
     * @return mixed The name of the article visible in the trash
     */
    public function trashTitle()
    {
        return $this->title;
    }

    /**
     * @return string Document type visible in the trash
     */
    public function trashDocumentType()
    {
        return 'Article';
    }

    /**
     * @return mixed The date, when was the article trashed ..
     */
    public function trashedAt()
    {
        return $this->deleted_at;
    }
}
