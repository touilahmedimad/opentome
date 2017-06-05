<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PageController extends Controller
{
    public function index($page)
    {
        $page = Page::whereSlug($page)->firstOrFail();
        return view('pages.page')->with('page',$page);
    }
}
