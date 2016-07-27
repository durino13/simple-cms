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
    public function index()
    {
        $dl = new DirectoryListing('images');
        return view('admin.media.index', ['list' => $dl->getDirectoryContent()]);
    }

    /**
     * This will display the media window in the TinyMCE editor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function embedded()
    {
        $dl = new DirectoryListing('images');
        return view('admin.media.embedded', ['list' => $dl->getDirectoryContent()]);
    }
}
