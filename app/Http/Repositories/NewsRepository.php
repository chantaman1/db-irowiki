<?php

namespace App\Http\Repositories;

use App\Model\News;

class NewsRepository
{
    protected $news;

    public function get_news()
    {
        $news = News::select('topic', 'date', 'message')->where('version', 2)->orderBy('date', 'desc')->limit(5)->get();
        return $news;
    }

}