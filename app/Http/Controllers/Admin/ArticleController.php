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
        $articles = Article::getArticles(null, 0);
        return view('admin.article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.edit');
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

        // Save article
        $article = new Article();
        $this->saveArticle($request, $article);

        // Save article categories
        $article->categories()->attach((array) $request->input('categories'));

        // Return the result
        return response()->json(['result' => true]);

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
        return view('admin.article.edit', ['article' => $article]);
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
        $this->saveArticle($request, $article);

        // Add / remove related categories ..
        $article->categories()->sync((array) $request->input('categories'));

        $request->session()->flash('status', 'Article was successfully saved!');

        if ($request->get('action') == 'save') {
            return redirect()->route('administrator.article.edit', ['article' => $article]);
        } elseif ($request->get('action') == 'save_and_close') {
            return redirect()->route('administrator.article.index');
        }

    }

    /**
     * Move the article into the trash
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {

        try {

            $article = Article::find($id);
            $article->delete();

            return response()->json(['result' => true]);

        } catch(Exception $e) {
            $msg = 'An error occured: ';
            return response()->json(['result' => false, 'message' => $msg.$e->getMessage()]);
        }

    }

    /**
     * Move many articles into the trash at once ..
     * @param Request $request
     * @param array $ids Article IDs you want to trash
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyMany(Request $request, array $ids)
    {
        try {

            foreach ($ids as $id) {
                $article = Article::find($id);
                $article->delete();
            }

            return response()->json(['result' => true]);

        } catch (Exception $e) {
            $msg = 'An error occured: ';
            return response()->json(['result' => false, 'message' => $msg.$e->getMessage()]);
        }
    }

    // Archive methods

    /**
     * Archive the article
     * @param $id
     * @return mixed
     */
    public function archive($id)
    {
        $article = Article::find($id);
        $article->archive = 1;
        $article->save();

        return response()->json(['result' => true]);
    }

    /**
     * List articles in the archive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listArchive(Request $request)
    {
        $currentURL = $request->path();
        $articles = Article::getArchivedArticles();
        return view('admin.article.index', ['articles' => $articles, 'currentURL' => $currentURL]);
    }

    /**
     * Unarchive the article ..
     * @param $id
     * @return mixed
     */
    public function restore($id)
    {
        $article = Article::find($id);
        $article->archive = 0;
        $article->save();

        return response()->json(['result' => true]);
    }

    // Delete methods

    /**
     * Delete the article completelly from the database
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function wipe($id)
    {
        $article = Article::find($id);
        $article->delete();

        return response()->json(['result' => true]);
    }

    /**
     * @param Request $request
     * @param $article
     */
    protected function saveArticle(Request $request, $article)
    {
        $article->title = $request->input('title');
        $article->alias = $request->input('alias');
        $article->article_text = $request->input('article_text');
        $article->status_id = $request->input('status');
        $article->user_id = 1;
        $article->start_publishing = $request->input('start_publishing');
        $article->finish_publishing = $request->input('finish_publishing');
        $article->save();
    }


}
