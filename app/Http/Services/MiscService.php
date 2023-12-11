<?php

namespace App\Http\Services;

use App\Http\Repositories\MiscRepository;
use App\Http\Helpers\ItemHelpers;

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

    public function ArrowMenu()
    {
        
        $arrowCatgories = array(
            "Standard" => array(1750, 1770, 1765, 1764, 1753), 
            "Elemental" => array(1767, 1755, 1754, 1752, 1772, 1757, 1762, 1751, 1756), 
            "Status" => array(1761, 1760, 1759, 1769, 1763, 1768, 1758)
        );
        
        $output = array();
        foreach($arrowCatgories as $arrowCategory => $arrows)
        {
            $arrowInfo = array();
            foreach($arrows as $arrowID)
            {
                $arrow = (new MiscRepository)->getItem($arrowID);
                array_push($arrowInfo, array(
                    'id' => $arrowID,
                    'name' => $arrow->name
                ));
            }
            $output[$arrowCategory] = $arrowInfo;
        }

        return $output;
    }

    public function MaterialsFromArrow(int $arrowID)
    {
        $miscRepository = new MiscRepository();

        $output = array(
            'arrow' => array(),
            'materials' => array()
        );

        $arrow = $miscRepository->getItem($arrowID);
        
        if(is_null($arrow))
            return $output;

        $output['arrow'] = array(
            'id' => $arrow->id,
            'name' => $arrow->name
        );

        $arrowMaterials = $miscRepository->getArrowMaterials($arrow->id);
        
        $items = array();
        foreach($arrowMaterials as $arrowMaterial)
        {
            array_push($items, array(
                'item' => $arrowMaterial->item,
                'name' => $arrowMaterial->name,
                'amount' => $arrowMaterial->amount,
            ));
        }

        $output['materials'] = $items;

        return $output;
    }

    public function ArrowsFromItem(int $itemID)
    {
        $miscRepository = new MiscRepository();
        
        $output = array(
            'item' => array(),
            'arrows' => array()
        );

        $item = $miscRepository->getItem($itemID);

        if(is_null($item))
            return $output;

        $output['item'] = array(
            'id' => $item->id,
            'name' => $item->name
        );

        $items = $miscRepository->getArrowsFromItem($item->id);
        
        $arrows = array();
        foreach($items as $item)
        {
            array_push($arrows, array(
                'arrow' => $item->arrow,
                'name' => $item->name,
                'amount' => $item->amount,
            ));
        }

        $output['arrows'] = $arrows;

        return $output;
    }

    public function MonstersFromItem(int $itemID)
    {
        $miscRepository = new MiscRepository();

        $output = array(
            'item' => array(),
            'monsters' => array()
        );

        $item = $miscRepository->getItem($itemID);

        if(is_null($item))
            return $output;

        $output['item'] = array(
            'id' => $item->id,
            'name' => $item->name
        );

        $monstersFromItem = $miscRepository->getMonsterByDrop($item->id);

        $monsters = array();
        foreach($monstersFromItem as $monster)
        {
            array_push($monsters, array(
                'id' => $monster->id,
                'name' => $monster->name,
                'rate' => ItemHelpers::getDropRate($monster->rate, true),
                'flag' => $monster->flag,
            ));
        }

        $output['monsters'] = $monsters;

        return $output;
    }
}