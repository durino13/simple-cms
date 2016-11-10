<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Trash;
use App\User;
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
        $trash->addCollection(Article::onlyTrashed()->get());
//        $trash->addCollection(Category::onlyTrashed()->get());
//        $trash->addCollection(User::onlyTrashed()->get());
        $trash->addCollection($test);

        return view('admin.trash.index', ['items'=> $trash->getCollection()]);
    }

    /**
     * Restore the item from the trash
     */
    public function restore(Request $request, $id)
    {
        $SUCCESS_MESSAGE = 'The Article has been successfully restored.';

        $model = Article::withTrashed()->findOrFail($id);
        $model->restore();

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

        $SUCCESS_MESSAGE = 'The item(s) have been permanently deleted.';

        try {
            $model = Article::withTrashed()
                ->where('id', $id)
                ->first();

            // Detach article categories ..
            $model->categories()->detach();

            $model->forceDelete();

            if ($request->ajax()) {
                return response()->json(
                    [
                        'result' => [
                            'result' => true
                        ]
                    ]
                );
            } else {
                return redirect()->route('administrator.trash.index');
            }
        } catch (Exception $e) {
            return response()->json([
                'result' => [
                    'result' => false,
                    'error' => $e->getMessage()
                ]
            ]);
        }
    }

}
