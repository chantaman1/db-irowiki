<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MainService;

class MainController extends Controller
{
    public function Index(Request $request)
    {
        $news = (new MainService)->News();
        return view('main/news', ['data' => $news]);
    }

    public function Search(Request $request)
    {
        $results = null;
        $categories = null;

        $search = $request->get('search', null);
        $quick = $request->get('quick', null);
        $type = $request->get('type', null);

        if($search != null)
        {
            $results = (new MainService)->search($search, $type);
            $categories = (new MainService)->Categories();
        }
        elseif($quick != null)
        {
            $results = (new MainService)->search($quick, $type);
            $categories = (new MainService)->Categories();
        }

        return view('main/search', [
            'search' => !is_null($search) ? $search : (!is_null($quick) ? $quick : ""),
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