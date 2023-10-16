<?php

namespace App\Http\Repositories;

use App\Model\News;

class NewsRepository
{
    protected $news;

    public function get_news()
    {
        #$news = News::select('topic', 'date', 'message')->where('version', 2)->orderBy('date', 'desc')->limit(5)->get();
        $new1 = new News();
        $new1->topic = 'Ugly Mock for the News 1';
        $new1->date = '10/13/2023';
        $new1->message = 'Text with random HTML tags <br><br> ~Pingaify';
        $new2 = new News();
        $new2->topic = 'Ugly Mock for the News 2';
        $new2->date = '10/13/2023';
        $new2->message = 'And another one <br><br> ~Pingaify';
        $new3 = new News();
        $new3->topic = 'Ugly Mock for the News 3';
        $new3->date = '10/13/2023';
        $new3->message = 'Wheres my Caramel Macchiatto <br><br> BTW this is not the ideal way to mock in Laravel <br><br> ~Pingaify';
        $news = array($new1, $new2, $new3);
        return $news;
    }

}