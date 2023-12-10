@extends('layout.app')

@push('scripts')
    <script src="{{ asset('js/item/info.js') }}"></script>
@endpush

@section('content')
    @if (is_null($data) || !is_null($data["item"]))
        <div class="bgMdTitle mdTitle">Item Info</div>
        <table class="bgDkRow2">
            @include('templates.item.info.item-search', [ "menuCatData" => $menuCats, "menuSubCat" => $subMenuCats ])
        </table>
        @if (!is_null($data) && !is_null($data["item"]))
            <div class="mdSeperator">&nbsp;</div>
            <table>
                <tbody>
                    <tr>
                        <td style="vertical-align:top;" colspan="3">
                            @include('templates.item.info.item-header', [ "itemData" => $data["item"] ])
                            @include('templates.item.info.description', [ "itemData" => $data["item"], "itemSpecialMainData" => $data["itemSpecialMain"], "itemSetData" => $data["itemSet"], "itemSpecialGroupMain" => $data["itemSpecialGroupMain"], "itemSpecialGroupList" => $data["itemSpecialGroupList"] ])
                        </td>
                    </tr>
                    <tr>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.info.main', [ "itemData" => $data["item"], "weaponData" => $data["weapon"], "adjectiveData" => $data["adjective"]] )
                        </td>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.info.stats', [ "itemData" => $data["item"], "weaponData" => $data["weapon"], "gearData" => $data["gear"], "itemHealData" => $data["itemHeal"], "itemSpecialStatsData" => $data["itemSpecialStats"] ])
                            @include('templates.item.info.size-modifier', [ "itemData" => $data["item"] ])
                            @include('templates.item.info.head-position', [ "itemData" => $data["item"], "gearData" => $data["gear"] ])
                        </td>
                        <td style="width:33.3%; vertical-align:top;">
                            @include('templates.item.info.npc-prices', [ "itemData" => $data["item"], "itemShopData" => $data["itemShop"] ])
                            @include('templates.item.info.item-shop', [ "itemShopData" => $data["itemShop"] ])
                            @include('templates.item.info.treasure-drop', [ "treasureData" => $data["treasureDrop"] ])
                        </td>
                    </tr>
                    @include('templates.item.info.jobs', [ "itemData" => $data["item"] ])
                    @include('templates.item.info.quest-list', [ "questData" => $data["quest"] ])
                    @include('templates.item.info.monster-drop', [ "monsterData" => $data["monster"], "monsterSpawn" => $data["monsterSpawn"] ])
                </tbody>
            </table>
        @endif
    @else
        @include('templates.item.info.item-error')
    @endif
    @include('layout.footer')
@endsection