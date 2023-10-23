@extends('layout.app')

@section('content')
    @if (is_null($data) || !is_null($data["item"]))
        <div class="bgMdTitle mdTitle">Item Info</div>
        <table class="bgDkRow2">
            @include('templates.item.item-search', [ "menuCatData" => $menuCats, "menuSubCat" => $subMenuCats ])
        </table>
        @if (!is_null($data) && !is_null($data["item"]))
            <div class="mdSeperator">&nbsp;</div>
            <table>
                <tbody>
                    <tr>
                        <td style="vertical-align:top;" colspan="3">
                            @include('templates.item.item-header', [ "itemData" => $data["item"] ])
                            @include('templates.item.description', [ "itemData" => $data["item"], "itemSpecialMainData" => $data["itemSpecialMain"], "itemSetData" => $data["itemSet"], "itemSpecialGroupMain" => $data["itemSpecialGroupMain"], "itemSpecialGroupList" => $data["itemSpecialGroupList"] ])
                        </td>
                    </tr>
                    <tr>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.main', [ "itemData" => $data["item"], "weaponData" => $data["weapon"], "adjectiveData" => $data["adjective"]] )
                        </td>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.stats', [ "itemData" => $data["item"], "weaponData" => $data["weapon"], "gearData" => $data["gear"], "itemHealData" => $data["itemHeal"], "itemSpecialStatsData" => $data["itemSpecialStats"] ])
                            @include('templates.item.size-modifier', [ "itemData" => $data["item"] ])
                            @include('templates.item.head-position', [ "itemData" => $data["item"], "gearData" => $data["gear"] ])
                        </td>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.npc-prices', [ "itemData" => $data["item"], "itemShopData" => $data["itemShop"] ])
                            @include('templates.item.item-shop', [ "itemShopData" => $data["itemShop"] ])
                            @include('templates.item.treasure-drop', [ "treasureData" => $data["treasureDrop"] ])
                        </td>
                    </tr>
                    @include('templates.item.jobs', [ "itemData" => $data["item"] ])
                    @include('templates.item.quest-list', [ "questData" => $data["quest"] ])
                    @include('templates.item.monster-drop', [ "monsterData" => $data["monster"], "monsterSpawn" => $data["monsterSpawn"] ])
                </tbody>
            </table>
        @endif
    @else
        @include('templates.item.item-error')
    @endif
    @include('layout.footer')
@endsection