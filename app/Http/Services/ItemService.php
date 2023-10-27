<?php

namespace App\Http\Services;

use App\Http\Repositories\ItemRepository;

class ItemService
{
    public function MenuCategories(int|null $id = null)
    {
        return (new ItemRepository)->getItemMenuCat($id);
    }

    public function MenuSubcategories(int|null $id = null)
    {
        return (new ItemRepository)->getSubMenuCat($id);
    }

    public function MenuData(int|null $id = null)
    {
        return (new ItemRepository)->getMenuData($id);
    }

    public function ItemInfo(int|null $id = null)
    {
        $itemRepository = new ItemRepository();

        $questType = array(
            1 => "Requirement",
            2 => "Quest Item",
            3 =>"Reward",
            4 =>"Exchange Requirement",
            5 =>"Exchange Reward"
        );

        $output = array(
            "item" => null,
            "weapon" => null,
            "gear" => null,
            "monster" => null,
            "monsterSpawn" => null,
            "quest" => null,
            "treasureDrop" => null,
            "adjective" => null,
            "itemSet" => null,
            "itemHeal" => null,
            "itemEnchant" => null,
            "itemSpecialMain" => null,
            "itemSpecialGroupMain" => null,
            "itemSpecialGroupList" => null,
            "itemSpecialStats" => null,
            "itemShop" => null
        );

        if(is_null($id))
        {
            return $output;
        }

        $itemMain = $itemRepository->getItemMainById($id);
        
        $output["item"] = $itemMain;

        if($itemMain === null)
        {
            return $output;
        }

        if($itemMain->category === 1 || $itemMain->category === 9)
        {
            $weaponInfo = $itemRepository->getItemWeaponById($id);

            $output["weapon"] = $weaponInfo;
        }

        if($itemMain->category === 2 || $itemMain->category === 8)
        {
            $gearInfo = $itemRepository->getItemGearById($id);

            $output["gear"] = $gearInfo;
        }

        if($itemMain->category === 3)
        {
            $adjectiveInfo = $itemRepository->getItemAdjectiveById($id);

            $output["adjective"] = $adjectiveInfo;
        }

        if($itemMain->category === 4 && $itemMain->subcat === 2)
        {
            $itemHealInfo = $itemRepository->getItemHealById($id);

            $output["itemHeal"] = $itemHealInfo;
        }

        if($itemMain->category === 1 || $itemMain->category === 2 || $itemMain->category === 5 || $itemMain->category === 8)
        {
            $itemEnchantInfo = $itemRepository->getItemEnchantById($id);

            $output["itemEnchant"] = count($itemEnchantInfo) > 0 ? $itemEnchantInfo : null;
        }

        $itemSetCheckInfo = $itemRepository->getItemSetTypeById($id);

        $itemSetInfo = array();
        if(count($itemSetCheckInfo) > 0)
        {
            foreach($itemSetCheckInfo as $itemSet)
            {
                $itemSetList = $itemRepository->getItemSetByTypeAndId($id, $itemSet);

                $itemSetSpecial = $itemRepository->getItemSetSpecialByType($itemSet);

                $itemSetGroupMain = $itemRepository->getItemSetSpecialGroupMainByType($itemSet);

                $itemSetGroupMainList = array();

                if(count($itemSetGroupMain) > 0)
                {   
                    foreach($itemSetGroupMain as $itemGroup)
                    {
                        $itemSetGroupList = $itemRepository->getItemSpecialGroupListByGroupMainAndType($itemSet, $itemGroup);

                        $itemSetGroupMainList[$itemGroup->grp] = $itemSetGroupList;
                    }
                }

                array_push($itemSetInfo, ["setType" => $itemSet->type, "itemSetInfo" => $itemSetList, "itemSetSpecial" => $itemSetSpecial, "itemSetGroupMain" => $itemSetGroupMain, "itemSetGroupList" => $itemSetGroupMainList]);
            }
        }

        $output["itemSet"] = count($itemSetInfo) > 0 ? $itemSetInfo : null;

        $itemSpecialCheckInfo = $itemRepository->getItemSpecialById($id);

        if($itemSpecialCheckInfo !== null)
        {
            $itemSpecialMainInfo = $itemRepository->getItemSpecialMainById($id);
    
            $output["itemSpecialMain"] = count($itemSpecialMainInfo) > 0 ? $itemSpecialMainInfo : null;
    
            $itemSpecialGroupMainInfo = $itemRepository->getItemSpecialGroupMainById($id);
    
            $output["itemSpecialGroupMain"] = count($itemSpecialGroupMainInfo) > 0 ? $itemSpecialGroupMainInfo : null;

            $itemSpecialGroupListArray = array();
            foreach($itemSpecialGroupMainInfo as $groupMain)
            {
                $itemSpecialGroupListInfo = $itemRepository->getItemSpecialGroupListByIdAndGroupMain($id, $groupMain);

                $itemSpecialGroupListArray[$groupMain->grp] = $itemSpecialGroupListInfo;
            }

            $output["itemSpecialGroupList"] = count($itemSpecialGroupListArray) > 0 ? $itemSpecialGroupListArray : null;
        }

        $itemSpecialStatsInfo = $itemRepository->getItemSpecialStatsById($id);

        $output["itemSpecialStats"] = count($itemSpecialStatsInfo) > 0 ? $itemSpecialStatsInfo : null;

        $itemShopInfo = $itemRepository->getItemShopById($id);

        $output["itemShop"] = count($itemShopInfo) > 0 ? $itemShopInfo : null;

        $monsterInfo = $itemRepository->getItemMonstersById($id);

        $output["monster"] = count($monsterInfo) > 0 ? $monsterInfo : null;

        $monsterSpawnInfoArray = array();
        foreach($monsterInfo as $monster)
        {
            $monsterSpawnInfo = $itemRepository->getMonsterSpawnByMonster($monster);

            if($monsterSpawnInfo !== null)
            {
                array_push($monsterSpawnInfoArray, $monsterSpawnInfo);
            }
        }

        $output["monsterSpawn"] = count($monsterSpawnInfoArray) > 0 ? $monsterSpawnInfoArray : null;

        $checkQuestInfo = $itemRepository->getItemQuestsById($id);

        if($checkQuestInfo !== null)
        {
            $questList = array(
                "Requirement" => null,
                "Quest Item" => null,
                "Reward" => null,
                "Exchange Requirement" => null,
                "Exchange Reward" => null
            );

            foreach($questType as $typeId => $value)
            {
                $questInfo = $itemRepository->getQuestByIdAndType($id, $typeId);

                $questList[$value] = count($questInfo) > 0 ? $questInfo : null;
            }

            $output["quest"] = $questList;
        }

        $treasureInfo = $itemRepository->getItemTreasureById($id);

        $output["treasureDrop"] = count($treasureInfo) > 0 ? $treasureInfo : null;

        return $output;
    }

    public function WeaponSearch(array $inputs)
    {
        $itemRepository = new ItemRepository();

        $output = array(
            "weaponInfo" => null,
            "weaponSpecial" => null
        );

        $output["weaponInfo"] = $itemRepository->getWeaponInfoByInputs($inputs);
        
        if(!is_null($inputs["detailed"]) && $inputs["detailed"] === "true")
        {
            $weaponSpecialList = array();

            $weaponSpecial = $itemRepository->getWeaponSpecialByInputs($inputs)->all();

            $weaponTemporal = array(
                "description" => null,
                "special" => array()
            );
            while($item = current($weaponSpecial))
            {
                $nextItem = next($weaponSpecial);

                if(is_null($weaponTemporal["description"]))
                {
                    $weaponTemporal["description"] = $item->description;
                }
                
                if(!is_null($item->special))
                {
                    array_push($weaponTemporal["special"], $item->special);
                }
                
                if($nextItem)
                {
                    if($item->id !== $nextItem->id)
                    {
                        $weaponSpecialList[$item->id] = $weaponTemporal;
                        $weaponTemporal = array(
                            "description" => null,
                            "special" => array()
                        );
                    }
                }
                else
                {
                    $weaponSpecialList[$item->id] = $weaponTemporal;
                    $weaponTemporal = array(
                        "description" => null,
                        "special" => array()
                    );
                }
            }
            $output["weaponSpecial"] = $weaponSpecialList;
        }
        return $output;
    }

    public function GearSearch(array $inputs)
    {
        $itemRepository = new ItemRepository();

        $output = array(
            "gearInfo" => null,
            "gearSpecial" => null
        );

        $output["gearInfo"] = $itemRepository->getGearInfoByInputs($inputs);
        
        if(!is_null($inputs["detailed"]) && $inputs["detailed"] === "true")
        {
            $gearSpecialList = array();

            $gearSpecial = $itemRepository->getGearSpecialByInputs($inputs)->all();

            $gearTemporal = array(
                "description" => null,
                "special" => array()
            );
            while($gear = current($gearSpecial))
            {
                $nextGear = next($gearSpecial);

                if(is_null($gearTemporal["description"]))
                {
                    $gearTemporal["description"] = $gear->description;
                }
                
                if(!is_null($gear->special))
                {
                    array_push($gearTemporal["special"], $gear->special);
                }
                
                if($nextGear)
                {
                    if($gear->id !== $nextGear->id)
                    {
                        $gearSpecialList[$gear->id] = $gearTemporal;
                        $gearTemporal = array(
                            "description" => null,
                            "special" => array()
                        );
                    }
                }
                else
                {
                    $gearSpecialList[$gear->id] = $gearTemporal;
                    $gearTemporal = array(
                        "description" => null,
                        "special" => array()
                    );
                }
            }
            $output["gearSpecial"] = $gearSpecialList;
        }

        return $output;
    }

    public function CostumeSearch(array $inputs)
    {
        $itemRepository = new ItemRepository();

        $output = array(
            "costumeInfo" => null,
            "costumeSpecial" => null
        );

        $output["costumeInfo"] = $itemRepository->getCostumeInfoByInputs($inputs);
        
        if(!is_null($inputs["detailed"]) && $inputs["detailed"] === "true")
        {
            $gearSpecialList = array();

            $gearSpecial = $itemRepository->getCostumeSpecialByInputs($inputs)->all();

            $gearTemporal = array(
                "description" => null,
                "special" => array()
            );
            while($gear = current($gearSpecial))
            {
                $nextGear = next($gearSpecial);

                if(is_null($gearTemporal["description"]))
                {
                    $gearTemporal["description"] = $gear->description;
                }
                
                if(!is_null($gear->special))
                {
                    array_push($gearTemporal["special"], $gear->special);
                }
                
                if($nextGear)
                {
                    if($gear->id !== $nextGear->id)
                    {
                        $gearSpecialList[$gear->id] = $gearTemporal;
                        $gearTemporal = array(
                            "description" => null,
                            "special" => array()
                        );
                    }
                }
                else
                {
                    $gearSpecialList[$gear->id] = $gearTemporal;
                    $gearTemporal = array(
                        "description" => null,
                        "special" => array()
                    );
                }
            }
            $output["costumeSpecial"] = $gearSpecialList;
        }

        return $output;
    }

    public function ConsumeSearch(array $inputs)
    {
        $itemRepository = new ItemRepository();

        $output = array(
            "consumeInfo" => null,
            "consumeSpecial" => null
        );

        $output["consumeInfo"] = $itemRepository->getConsumeInfoByInputs($inputs);
        
        if(!is_null($inputs["detailed"]) && $inputs["detailed"] === "true")
        {
            $itemSpecialList = array();

            $itemSpecial = $itemRepository->getConsumeSpecialByInputs($inputs)->all();

            $itemTemporal = array(
                "description" => null,
                "special" => array()
            );
            while($item = current($itemSpecial))
            {
                $nextItem = next($itemSpecial);

                if(is_null($itemTemporal["description"]))
                {
                    $itemTemporal["description"] = $item->description;
                }
                
                if(!is_null($item->special))
                {
                    array_push($itemTemporal["special"], $item->special);
                }
                
                if($nextItem)
                {
                    if($item->id !== $nextItem->id)
                    {
                        $itemSpecialList[$item->id] = $itemTemporal;
                        $itemTemporal = array(
                            "description" => null,
                            "special" => array()
                        );
                    }
                }
                else
                {
                    $itemSpecialList[$item->id] = $itemTemporal;
                    $itemTemporal = array(
                        "description" => null,
                        "special" => array()
                    );
                }
            }
            $output["consumeSpecial"] = $itemSpecialList;
        }

        return $output;
    }

    public function CardSearch(array $inputs)
    {
        $itemRepository = new ItemRepository();

        $output = array();
        $cards = $itemRepository->getCardSearchByInputs($inputs)->all();

        $cardOutput = array(
            "id" => null,
            "name" => null,
            "adjective" => null,
            "subcat" => null,
            "groupMain" => array(),
            "groupList" => array()
        );

        while($card = current($cards))
        {
            $nextCard = next($cards);

            if(is_null($cardOutput["id"]))
            {
                $cardOutput["id"] = $card->id;
            }

            if(is_null($cardOutput["name"]))
            {
                $cardOutput["name"] = $card->name;
            }

            if(is_null($cardOutput["adjective"]))
            {
                $cardOutput["adjective"] = $card->adjective;
            }

            if(is_null($cardOutput["subcat"]))
            {
                $cardOutput["subcat"] = $card->subcat;
            }

            if($nextCard)
            {
                if($card->id === $nextCard->id)
                {
                    if($card->grp === 0 || ($card->grp > 0 && $card->num === 0))
                    {
                        array_push($cardOutput["groupMain"], array("grp" => $card->grp, "special" => $card->special));
                    }
                    else
                    {
                        array_push($cardOutput["groupList"], array("grp" => $card->grp, "special" => $card->special));
                    }
                }
                else
                {
                    if($card->grp === 0 || ($card->grp > 0 && $card->num === 0))
                    {
                        array_push($cardOutput["groupMain"], array("grp" => $card->grp, "special" => $card->special));
                    }
                    else
                    {
                        array_push($cardOutput["groupList"], array("grp" => $card->grp, "special" => $card->special));
                    }

                    array_push($output, $cardOutput);
                    $cardOutput = array(
                        "id" => null,
                        "name" => null,
                        "adjective" => null,
                        "subcat" => null,
                        "groupMain" => array(),
                        "groupList" => array()
                    );
                }
            }
            else
            {
                if($card->grp === 0 || ($card->grp > 0 && $card->num === 0))
                {
                    array_push($cardOutput["groupMain"], array("grp" => $card->grp, "special" => $card->special));
                }
                else
                {
                    array_push($cardOutput["groupList"], array("grp" => $card->grp, "special" => $card->special));
                }

                array_push($output, $cardOutput);
                $cardOutput = array(
                    "id" => null,
                    "name" => null,
                    "adjective" => null,
                    "subcat" => null,
                    "groupMain" => array(),
                    "groupList" => array()
                );
            }
        }

        return $output;
    }
}