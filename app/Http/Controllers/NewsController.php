<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\NewsRepository;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = (new NewsRepository)->get_news();
        return view('news', ['data' => $news]);
    }
}
