<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\MainRepository;

class MainService
{
    public function News()
    {
        return (new MainRepository)->getNews();
    }

    public function Categories()
    {
        return (new MainRepository)->getCategories();
    }

    public function Search(string $term, int|null $type)
    {
        $searchResults = new Collection();
        $mainRepository = new MainRepository();
        if ($type == null || ($type & 0x1) == 0x1) {
            $searchResults = $searchResults->mergeRecursive($mainRepository->getSearchItems($term));
        }

        if ($type == null || ($type & 0x2) == 0x2) {
            $searchResults = $searchResults->mergeRecursive($mainRepository->getSearchMonsters($term));
        }

        if ($type == null || ($type & 0x4) == 0x4) {
            $searchResults = $searchResults->mergeRecursive($mainRepository->getSearchMaps($term));
        }

        if ($type == null || ($type & 0x8) == 0x8) {
            $searchResults = $searchResults->mergeRecursive($mainRepository->getSearchShops($term));
        }

        return $searchResults;
    }

}