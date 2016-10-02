<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Trash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = new Collection();
        $trash = new Trash();
        $trash->addCollection(Article::where('trash', 1)->get());
        $trash->addCollection(Category::where('trash', 1)->get());
        $trash->addCollection($test);

        return view('admin.trash.index', ['items'=> $trash->getCollection()]);
    }

    /**
     * Restore the item from the trash
     */
    public function restore(Request $request, $id)
    {

        $SUCCESS_MESSAGE = 'The Article has been successfully restored.';

        $model = Article::findOrFail($id);
        $model->trash = 0;
        $model->save();

        $request->session()->flash('status', $SUCCESS_MESSAGE);
        if ($request->ajax()) {
            return response()->json(
                [
                    'result' => true
                ]
            );
        } else {
            return redirect()->route('administrator.trash.index');
        }
    }

    /**
     * Restore the item from the trash
     */
    public function destroy(Request $request, $id)
    {

        $SUCCESS_MESSAGE = 'The Article has been successfully deleted.';

        $model = Article::findOrFail($id);
        // TODO Remove first all relationships ..
        $model->delete();
        $request->session()->flash('status', $SUCCESS_MESSAGE);

        if ($request->ajax()) {
            return response()->json(
                [
                    'result' => true
                ]
            );
        } else {
            return redirect()->route('administrator.trash.index');
        }
    }

}
