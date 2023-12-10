<?php

namespace App\Http\Services;

use App\Http\Repositories\MiscRepository;

class MiscService
{
    public function MenuCategories()
    {
        return (new MiscRepository)->getMaps();
    }

    public function MenuShops()
    {
        return (new MiscRepository)->getShopCategories();
    }

    public function ShopInfo(string|null $shopID = null)
    {
        $miscRepository = new MiscRepository();

        $output = [
            'shop' => null,
            'items' => []
        ];

        if(is_null($shopID)) return "";

        $shop = $miscRepository->getShop($shopID);

        $output['shop'] = $shop;
        
        if(is_null($shop))
            return $output;

        $shopItems = $miscRepository->getShopItems($shopID);
        
        $items = [];
        foreach($shopItems as $shopItem)
        {
            $item = $miscRepository->getShopItemPrice($shopItem->item);
            array_push($items, array(
                'item' => $shopItem,
                'price' => $item->price
            ));
        }

        $output['items'] = $items;

        return $output;
    }

    public function RealmMenu()
    {
        return (new MiscRepository)->getRealmList();
    }

    public function RealmInfo(int $realmID)
    {
        $miscRepository = new MiscRepository();

        $output = [
            'realm' => null,
        ];

        $realm = $miscRepository->getRealm($realmID);

        $output['realm'] = $realm;

        if(is_null($realm))
            return $output;

        return $output;
    }
}