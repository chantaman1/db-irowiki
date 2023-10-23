<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\MainRepository;

class MainController extends Controller
{
    public function Index(Request $request)
    {
        $news = (new MainRepository)->getNews();
        return view('main/news', ['data' => $news]);
    }

    public function Search(Request $request)
    {
        $searchTerm = "";
        $results = null;
        $categories = null;

        $search = $request->get('search', null);
        $quick = $request->get('quick', null);
        $type = $request->get('type', null);

        if($search != null)
        {
            $results = (new MainRepository)->search($search, $type);
            $categories = (new MainRepository)->getCategories();
            $searchTerm = $search;
        }
        elseif($quick != null)
        {
            $results = (new MainRepository)->search($quick, $type);
            $categories = (new MainRepository)->getCategories();
            $searchTerm = $quick;
        }

        return view('main/search', [
            'search' => $searchTerm,
            'type' => $type,
            'data' => $results,
            'categories' => $categories
        ]);
    }

    public function Settings(Request $request)
    {
        return view('main/settings');
    }
}