<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Model\DirectoryListing;
use Illuminate\Http\Request;

class MediaController extends Controller
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
    public function index(Request $request)
    {
        $dl = $this->setup($request);
        return view('admin.media.index', ['list' => $dl->listDirectory()]);
    }

    /**
     * This will display the media window in the TinyMCE editor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function embedded(Request $request)
    {
        $dl = $this->setup($request);
        return view('admin.media.embedded', ['list' => $dl->listDirectory()]);
    }

    public function destroy(Request $request)
    {
        $itemToDelete = $request->get('path');
        // TODO Delete file here ..
        var_dump($itemToDelete);
        exit();
    }

    private function setup($request)
    {
        $pathToScan = ($request->query('path') !== null) ? $request->query('path') : 'images';
        return new DirectoryListing($pathToScan);
    }

}
