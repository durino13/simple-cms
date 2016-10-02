<?php

namespace App;

use App\Interfaces\ITrashable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements ITrashable
{

    const JOBS = 1;
    const PROJECTS_ACTIVITIES = 2;
    const RIGHT_NEWS = 3;
    const BLOG = 4;

    protected $table = 'c_category';

    /*
     * Relationships
     */

    public function articles()
    {
        $this->belongsToMany('App\Article', 'r_article_category');
    }

    /*
     * Methods
     */

    public static function getCategoryByCode($code)
    {
        return Category::where('code', $code)->first();
    }

    /*
     * Trash methods
     */

    public function trashTitle()
    {
        return $this->name;
    }

    public function trashDocumentType()
    {
        return 'Category';
    }

    public function trashedAt()
    {
        return $this->updated_at;
    }
}
