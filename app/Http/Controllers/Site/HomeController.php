<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allNews = Article::where('status_id', 2)->where('category_id', 2); // get only active articles in the 'news' category ..
        $rightNewsArticle = Article::all()->where('alias','who-am-i');
        $allJobs = Article::where('status_id', 2)->where('category_id', 1)->where('trash', null)->orderBy('created_on', 'desc');

        return view(
            'site.layouts.main',
            [
                'allNews' => $allNews,
                'rightNewsArticle' => $rightNewsArticle,
                'allJobs' => $allJobs
            ]
        );
    }
}
