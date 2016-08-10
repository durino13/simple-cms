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
        $allNews = Article::where('status_id', 2)
            ->where('category_id', 2)
            ->where('archive', null)
            ->where('trash', null)
            ->orderBy('start_publishing', 'desc')
            ->get();

        $rightNewsArticle = Article::all()->where('alias','who-am-i');
        
        $allJobs = Article::where('status_id', 2)->where('category_id', 1)->where('trash', null)->orderBy('start_publishing', 'desc')->get();

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
