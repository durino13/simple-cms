<?php

namespace App\Http\Controllers\Admin;

use App\Providers\AppServiceProvider;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use Illuminate\Support\Facades\Redirect;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::getAllActiveArticlesByCategory();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'alias' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->alias = $request->input('alias');
        $article->article_text = $request->input('article_text');
        $article->status_id = $request->input('status');
        $article->category_id = $request->input('category');
        $article->user_id = $request->user()->id;
        $article->start_publishing = $request->input('start_publishing');
        $article->finish_publishing = $request->input('finish_publishing');
        $article->save();

        $request->session()->flash('status', 'Article was successfully saved!');

        if ($request->get('action') == 'save') {
            return redirect()->route('administrator.article.index');
        } elseif ($request->get('action') == 'save_and_close') {
            return redirect()->route('administrator.article.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'alias' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->alias = $request->input('alias');
        $article->article_text = $request->input('article_text');
        $article->status_id = $request->input('status');
        $article->category_id = $request->input('category');
        $article->user_id = 1;
        $article->start_publishing = $request->input('start_publishing');
        $article->finish_publishing = $request->input('finish_publishing');
        $article->save();

        $request->session()->flash('status', 'Article was successfully saved!');

        if ($request->get('action') == 'save') {
            return redirect()->route('administrator.article.edit', ['article' => $article]);
        } elseif ($request->get('action') == 'save_and_close') {
            return redirect()->route('administrator.article.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->trash = 1;
        $article->save();

        return response()->json(['result' => true]);

    }
}
