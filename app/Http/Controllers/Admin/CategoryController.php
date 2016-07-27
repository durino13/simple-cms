<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('trash', null)->get();
        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'code' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->code = $request->input('code');
        $category->valid_from = $request->input('valid_from');
        $category->valid_to = $request->input('valid_to');
        $category->save();

        $request->session()->flash('status', 'Category was successfully saved!');

        if ($request->get('action') == 'save') {
            return redirect()->route('administrator.category.edit', ['category' => $category]);
        } elseif ($request->get('action') == 'save_and_close') {
            return redirect()->route('administrator.category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
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
            'name' => 'required',
            'code' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->code = $request->input('code');
        $category->valid_from = $request->input('valid_from');
        $category->valid_to = $request->input('valid_to');
        $category->save();

        $request->session()->flash('status', 'Category was successfully saved!');

        if ($request->get('action') == 'save') {
            return redirect()->route('administrator.category.edit', ['category' => $category]);
        } elseif ($request->get('action') == 'save_and_close') {
            return redirect()->route('administrator.category.index');
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
        $category = Category::find($id);
        $category->trash = 1;
        $category->save();

        return response()->json(['result' => true]);
    }
}
