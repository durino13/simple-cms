<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Status;
use App\Category;
use App\Http\Controllers\Admin\Controller;
use DB;
use Tracy\Debugger;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Enable Tracy ..
        Debugger::enable();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allBlogArticles = Article::getArticles(Category::BLOG);
        $projectArticles = Article::getArticles(Category::PROJECTS_ACTIVITIES);
        $archivedArticles = Article::getArticles(Category::PROJECTS_ACTIVITIES, Status::ACTIVE_ID, 0, 1);
        $allJobs = Article::getArticles(Category::JOBS);
        $aboutMe = Article::getArticles(Category::ABOUT_ME);
        $rightNewsArticle = Article::all()->where('alias','who-am-i');

        return view(
            'site.layouts.main',
            [
                'allBlogArticles' => $allBlogArticles,
                'projectArticles' => $projectArticles,
                'rightNewsArticle' => $rightNewsArticle,
                'allJobs' => $allJobs,
                'archivedArticles' => $archivedArticles,
                'aboutMe' => $aboutMe[0]
            ]
        );
    }

    /**
     * Catch all rule, which finds an article based on it's alias
     *
     * @param $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($alias)
    {
        $article = Article::where('alias','=', $alias)->first();
        return view('site.layouts.detail', ['article' => $article]);
    }

}
