<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Status;
use App\Category;
use App\Http\Controllers\Admin\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // I dont need auth on the front end ..
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get only active articles in the 'news' category ..
        $allNews = Article::where('status_id', Status::ACTIVE_ID)
            ->where('category_id', Category::NEWS)
            ->where('archive', null)
            ->where('trash', null)
            ->orderBy('start_publishing', 'desc')
            ->get();

        $archivedArticles = Article::where('status_id', Status::ACTIVE_ID)
            ->where('archive', 1)
            ->where('trash', null)
            ->orderBy('start_publishing', 'desc')
            ->get();

        $rightNewsArticle = Article::all()->where('alias','who-am-i');
        
        $allJobs = Article::where('status_id', Status::ACTIVE_ID)->where('category_id', Category::JOBS)->where('trash', null)->orderBy('start_publishing', 'desc')->get();

        return view(
            'site.layouts.main',
            [
                'allNews' => $allNews,
                'rightNewsArticle' => $rightNewsArticle,
                'allJobs' => $allJobs,
                'archivedArticles' => $archivedArticles
            ]
        );
    }
}
