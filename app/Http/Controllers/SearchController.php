<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\SearchRepository;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = null;
        $search = $request->get('search', null);
        if($search != null)
        {
            $results = (new SearchRepository)->searchItems($search);
        }
        return view('search', ['data' => $results]);
    }
}
