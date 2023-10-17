<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\SearchRepository;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = null;
        $categories = null;

        $search = $request->get('search', null);
        $quick = $request->get('quick', null);
        $type = $request->get('type', null);

        if($search != null)
        {
            $results = (new SearchRepository)->search($search, $type);
            $categories = (new SearchRepository)->getCategories();
        }
        elseif($quick != null)
        {
            $results = (new SearchRepository)->search($quick, $type);
            $categories = (new SearchRepository)->getCategories();
        }

        return view('search', ['data' => $results, 'categories' => $categories]);
    }
}
