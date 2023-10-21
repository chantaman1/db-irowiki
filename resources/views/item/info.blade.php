@extends('layout.app')

@section('content')
@if (is_null($data) || !is_null($data["item"]))
<div class="bgMdTitle mdTitle">Item Info</div>
<table class="bgDkRow2">
    <tr>
        <td class="padded nowrap" style="width:70%;">
            <form class="blockNormal" onsubmit="return changeItemPage();">
                <select id="categoryMenu" style="width:120px;" onchange="listSubCatMenu( {{ $subMenuCats }} );">
                    @if (!is_null($menuCats))
                    <option value="0">(All)</option>
                    @foreach ($menuCats as $menuItem)
                    <option @selected($menuItem->category == 1) value="{{ $menuItem->category }}">{{ $menuItem->name }}</option>
                    @endforeach
                    @endif
                </select>
                <select id="subcatMenu" style="width:120px;" onchange="listMainMenu();">
                </select>
                <select id="mainMenu" style="width:260px;"></select>
                <input type="submit" value="Go">
                &nbsp;
                Search: <input type="text" id="search" style="width:150px;" onkeyup="searchBox(event);" />
            </form>
        </td>
        <td style="width:30%; text-align:right; font-size:11pt;">
            <a href="/db/settings/">Settings</a>&nbsp;
        </td>
    </tr>
</table>
@if (!is_null($data) && !is_null($data["item"]))
    <div class="mdSeperator">&nbsp;</div>
    <table>
        <tbody>
            <tr>
                <td style="vertical-align:top;" colspan="3">
                    <table class="bgMdTitle">
                        <tbody>
                            <tr>
                                <td class="padded" style="width:2%;"><img src="https://db.irowiki.org/image/item/{{ $data["item"]->id }}.png"></td>
                                <td class="mdTitle" style="width:98%;">{{ $data["item"]->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if ($data["item"]->description !== "NULL" || !is_null($data["itemSpecialMain"]) || !is_null($data["item"]->notes))
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow1 padded">
                                        @if ($data["item"]->description !== "NULL" && $data["item"]->category !== 3)
                                            {!! html_entity_decode(str_replace("\n", "<br>", $data["item"]->description)) !!}
                                        @endif
                                        @if (!is_null($data["itemSpecialMain"]))
                                            @if ($data["item"]->description !== "NULL" && $data["item"]->category !== 3)
                                                <hr>
                                            @endif
                                            <ul>
                                                @foreach ($data["itemSpecialMain"] as $specialMain)
                                                    <li>{{ $specialMain->special }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if (!is_null($data["item"]->notes) && $data["item"]->notes !== "")
                                            <div style="padding-left:10px; padding-top:4px;">
                                                <div style="color:rgba(30,30,110,1)">Special Notes:</div>
                                                <ul>
                                                    @foreach (explode("\n", $data["item"]->notes) as $note)
                                                        <li>{{ $note }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width:33.3%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">Main</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded itemInfoTitle">Type</td>
                                <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getItemTypeName($data["item"]->category) }}</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded itemInfoTitle">Subtype</td>
                                <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getItemTypeName($data["item"]->category, $data["item"]->subcat) }}</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded itemInfoTitle">Weight</td>
                                <td class="bgLtRow1 padded itemInfoText">{{ $data["item"]->weight !== -1 ? $data["item"]->weight / 10 : "??" }}</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            @if ($data["item"]->category === 4 || $data["item"]->category === 5 || $data["item"]->category === 7)
                                <tr>
                                    <td class="bgLtRow4 padded itemInfoTitle"><a href="http://irowiki.org/wiki/Buying_Store">Buy Shop</a></td>
                                    @if ($data["item"]->buyable === 1)
                                        <td class="bgLtRow2 padded itemInfoText"><img src="https://db.irowiki.org/image/yes.png"> Yes</td>
                                    @else
                                        <td class="bgLtRow2 padded itemInfoText"><img src="https://db.irowiki.org/image/no.png"> No</td>
                                    @endif
                                </tr>
                            @endif
                            @if (!is_null($data["weapon"]))
                                @if (isset($data["weapon"]->element))
                                    <tr>
                                        <td class="bgLtRow4 padded itemInfoTitle">Element</td>
                                        <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getElementName($data["weapon"]->element) }}</td>
                                    </tr>
                                @endif
                                @if (isset($data["weapon"]->level))
                                    <tr>
                                        <td class="bgLtRow4 padded itemInfoTitle">Weapon Level</td>
                                        <td class="bgLtRow2 padded itemInfoText">{{ $data["weapon"]->level !== -1 ? $data["weapon"]->level : "??" }}</td>
                                    </tr>
                                @endif
                            @endif
                            @if (isset($data["item"]->reqlv))
                                <tr>
                                    <td class="bgLtRow4 padded itemInfoTitle">Required Level</td>
                                    <td class="bgLtRow2 padded itemInfoText">{{ $data["item"]->reqlv !== -1 ? $data["item"]->reqlv : "??" }}</td>
                                </tr>
                            @endif
                            @if ($data["item"]->category === 3)
                                @if (!is_null($data["adjective"]))
                                    <tr>
                                        <td class="bgLtRow3 padded itemInfoTitle">Adjective</td>
                                        <td class="bgLtRow1 padded itemInfoText">{{ $data["adjective"]->adjective }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Illustration</td>
                                    <td class="bgLtRow1 padded itemInfoText"><a href="javascript:openCardIllust({{ $data["item"]->id }});">(Click to View)</a></td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->upgrade))
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Upgradable</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ $data["item"]->upgrade === 1 ? "Yes" : "No" }}</td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->damage))
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Upgradable</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ $data["item"]->upgrade === 1 ? "Yes" : "No" }}</td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->binding) && $data["item"]->binding !== 0)
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Binding</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getBindingName($data["item"]->binding) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </td>
                <td style="width:33.3%; vertical-align:top;">
                    @if ($data["item"]->category === 1 || !is_null($data["gear"]) || !is_null($data["itemHeal"]) || !is_null($data["itemSpecialStats"]))
                    <div class="bgSmTitle smTitle">Stats</div>
                    <table class="bgLtTable">
                        <tbody>
                            @if ($data["item"]->category === 1)
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Atk</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ $data["weapon"]->atk !== -1 ? $data["weapon"]->atk : "??" }}</td>
                                </tr>
                                @if (isset($data["weapon"]->matk2) && $data["weapon"]->matk2 !== 0)
                                    <tr>
                                        <td class="bgLtRow3 padded itemInfoTitle">MAtk</td>
                                        <td class="bgLtRow1 padded itemInfoText">{{ $data["weapon"]->matk2 !== -1 ? $data["weapon"]->matk2 : "??" }}</td>
                                    </tr>
                                @endif
                            @elseif (!is_null($data["gear"]) && $data["item"]->category === 2)
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Def</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ $data["gear"]->def2 !== -1 ? $data["gear"]->def2 : "??" }}</td>
                                </tr>
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">MDef</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ $data["gear"]->mdef2 !== -1 ? $data["gear"]->mdef2 : "??" }}</td>
                                </tr>
                            @elseif (!is_null($data["itemHeal"]) && $data["item"]->category === 4 && $data["item"]->subcat === 2)
                                @if ($data["itemHeal"]->hpMin)
                                    <tr>
                                        <td class="bgLtRow3 padded itemInfoTitle">HP Heal</td>
                                        @if ($data["itemHeal"]->hpMin !== $data["itemHeal"]->hpMax)
                                            <td class="bgLtRow1 padded itemInfoText">{{ $data["itemHeal"]->hpMin }} ~ {{ $data["itemHeal"]->hpMax }}</td>
                                        @else
                                            <td class="bgLtRow1 padded itemInfoText">{{ $data["itemHeal"]->hpMin }}</td>
                                        @endif
                                    </tr>
                                @endif
                                @if ($data["itemHeal"]->spMin)
                                    <tr>
                                        <td class="bgLtRow3 padded itemInfoTitle">SP Heal</td>
                                        @if ($data["itemHeal"]->spMin !== $data["itemHeal"]->spMax)
                                            <td class="bgLtRow1 padded itemInfoText">{{ $data["itemHeal"]->spMin }} ~ {{ $data["itemHeal"]->spMax }}</td>
                                        @else
                                            <td class="bgLtRow1 padded itemInfoText">{{ $data["itemHeal"]->spMin }}</td>
                                        @endif
                                    </tr>
                                @endif
                            @endif
                            @if (!is_null($data["itemSpecialStats"]))
                                @foreach ($data["itemSpecialStats"] as $stats)
                                    <tr>
                                        <td class="bgLtRow3 padded itemInfoTitle">{{ ItemHelper::getItemStat($stats->special, true) }}</td>
                                        <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getItemStat($stats->special) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @endif
                    @if ($data["item"]->category === 1 && $data["item"]->subcat <= 22)
                        <div class="mdSeperator">&nbsp;</div>
                        <div class="bgSmTitle smTitle">Size Modifiers</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Small</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($data["item"]->subcat, 1) }}%</td>
                                </tr>
                                <tr>
                                    <td class="bgLtRow4 padded itemInfoTitle">Medium</td>
                                    <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($data["item"]->subcat, 2) }}%</td>
                                </tr>
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Large</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($data["item"]->subcat, 3) }}%</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                    @if (!is_null($data["gear"]) && ($data["item"]->category === 2 || $data["item"]->category === 8) && $data["item"]->subcat === 1)
                        <div class="mdSeperator">&nbsp;</div>
                        <div class="bgSmTitle smTitle">Head Position</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Top</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ ($data["gear"]->position & 1) === 1 ? "X" : "" }}</td>
                                </tr>
                                <tr>
                                    <td class="bgLtRow4 padded itemInfoTitle">Middle</td>
                                    <td class="bgLtRow2 padded itemInfoText">{{ ($data["gear"]->position & 2) === 2 ? "X" : "" }}</td>
                                </tr>
                                <tr>
                                    <td class="bgLtRow3 padded itemInfoTitle">Bottom</td>
                                    <td class="bgLtRow1 padded itemInfoText">{{ ($data["gear"]->position & 4) === 4 ? "X" : "" }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </td>
                <td style="width:33.3%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">NPC Prices</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded itemInfoTitle">Buying Price</td>
                                @if (!is_null($data["itemShop"]))
                                    <td class="bgLtRow1 padded itemInfoText">{{ number_format($data["item"]->price) }} Z {{ ItemHelper::getDiscountPrice($data["item"]->price) }}</td>
                                @else
                                    <td class="bgLtRow1 padded itemInfoText">--</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded itemInfoTitle">Selling Price</td>
                                @if ($data["item"]->price === -1)
                                    <td class="bgLtRow2 padded itemInfoText">?? Z</td>
                                @else
                                    @if (is_numeric($data["item"]->price))
                                        <td class="bgLtRow2 padded itemInfoText">{{ number_format(floor($data["item"]->price * 0.5)) }} Z {{ ItemHelper::getOverchargePrice($data["item"]->price * 0.5) }}</td>
                                    @else
                                        <td class="bgLtRow2 padded itemInfoText">(Cannot be sold)</td>
                                    @endif
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if (!is_null($data["itemShop"]))
                        <div class="mdSeperator">&nbsp;</div>
                        <div class="bgSmTitle smTitle">Purchasable At</div>
                        <table class="bgLtTable">
                            <tbody>
                                @foreach ($data["itemShop"] as $shop)
                                    <tr>
                                        <td class="bgLtRow2 padded">
                                            <a href="/db/shop-info/{{ $shop->id }}/">{{ $shop->mapName }} {{ $shop->shopName }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if (!is_null($data["treasureDrop"]))
                        <div class="mdSeperator">&nbsp;</div>
                        <div class="bgSmTitle smTitle">Guild Treasure Drops</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgHeader1 padded" style="width:70%;">Castle</td>
                                    <td class="bgHeader2 padded" style="width:30%;">Rate</td>
                                </tr>
                                @foreach ($data["treasureDrop"] as $treasure)
                                    <tr>
                                        <td class="bgLtRow1 padded">
                                            <a href="/db/treasure-drops/{{ $treasure->url }}/">
                                                @if ($treasure->realm === 0)
                                                    {{ $treasure->name }} #{{ $treasure->castle }}
                                                @elseif ($treasure->realm > 0 && $treasure->castle > 0)
                                                    {{ $treasure->name }} {{ $treasure->castle }}
                                                @else
                                                    {{ $treasure->name }}
                                                @endif
                                            </a>
                                        </td>
                                        <td class="bgLtRow2 padded">{{ ItemHelper::getDropRate($treasure->rate, true) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </td>
            </tr>
            @if (!is_null($data["item"]->job))
                <tr>
                    <td colspan="3">
                        @if ($data["item"]->category === 1 || $data["item"]->category === 2)
                            <div class="bgSmTitle smTitle">Equippable By</div>
                        @else
                            <div class="bgSmTitle smTitle">Usable By</div>
                        @endif
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow1">
                                        <table class="bgLtRow1">
                                            <tbody>
                                                <tr>
                                                    <td class="padded"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 1, 1) ? "yes" : "no" }}.png"> Novice</td>
                                                    <td class="padded"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 1, 1) ? "yes" : "no" }}.png"> Super Novice</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 2, 1) ? "yes" : "no" }}.png"> Swordman</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 3, 1) ? "yes" : "no" }}.png"> Merchant</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 4, 1) ? "yes" : "no" }}.png"> Thief</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 5, 1) ? "yes" : "no" }}.png"> Acolyte</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 6, 1) ? "yes" : "no" }}.png"> Mage</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 7, 1) ? "yes" : "no" }}.png"> Archer</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 8, 2) ? "yes" : "no" }}.png"> Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 10, 2) ? "yes" : "no" }}.png"> Blacksmith</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 12, 2) ? "yes" : "no" }}.png"> Assassin</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 14, 2) ? "yes" : "no" }}.png"> Priest</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 16, 2) ? "yes" : "no" }}.png"> Wizard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 18, 2) ? "yes" : "no" }}.png"> Hunter</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 9, 2) ? "yes" : "no" }}.png"> Crusader</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 11, 2) ? "yes" : "no" }}.png"> Alchemist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 13, 2) ? "yes" : "no" }}.png"> Rogue</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 15, 2) ? "yes" : "no" }}.png"> Monk</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 17, 2) ? "yes" : "no" }}.png"> Sage</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 19, 2) ? "yes" : "no" }}.png"> Bard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 20, 2) ? "yes" : "no" }}.png"> Dancer</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 8, 3) ? "yes" : "no" }}.png"> Lord Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 10, 3) ? "yes" : "no" }}.png"> Master Smith</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 12, 3) ? "yes" : "no" }}.png"> Assassin Cross</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 14, 3) ? "yes" : "no" }}.png"> High Priest</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 16, 3) ? "yes" : "no" }}.png"> High Wizard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 18, 3) ? "yes" : "no" }}.png"> Sniper</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 9, 3) ? "yes" : "no" }}.png"> Paladin</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 11, 3) ? "yes" : "no" }}.png"> Biochemist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 13, 3) ? "yes" : "no" }}.png"> Stalker</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 15, 3) ? "yes" : "no" }}.png"> Champion</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 17, 3) ? "yes" : "no" }}.png"> Scholar</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 19, 3) ? "yes" : "no" }}.png"> Minstrel</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 20, 3) ? "yes" : "no" }}.png"> Gypsy</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 8, 4) ? "yes" : "no" }}.png"> Rune Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 10, 4) ? "yes" : "no" }}.png"> Mechanic</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 12, 4) ? "yes" : "no" }}.png"> Guillotine Cross</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 14, 4) ? "yes" : "no" }}.png"> Arch Bishop</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 16, 4) ? "yes" : "no" }}.png"> Warlock</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 18, 4) ? "yes" : "no" }}.png"> Ranger</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 9, 4) ? "yes" : "no" }}.png"> Royal Guard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 11, 4) ? "yes" : "no" }}.png"> Geneticist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 13, 4) ? "yes" : "no" }}.png"> Shadow Chaser</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 15, 4) ? "yes" : "no" }}.png"> Sura</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 17, 4) ? "yes" : "no" }}.png"> Sorcerer</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 19, 4) ? "yes" : "no" }}.png"> Maestro</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 20, 4) ? "yes" : "no" }}.png"> Wanderer</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job,$data["item"]->reqlv, 8, 5) ? "yes" : "no" }}.png"> Dragon Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 10, 5) ? "yes" : "no" }}.png"> Meister</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 12, 5) ? "yes" : "no" }}.png"> Shadow Cross</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 14, 5) ? "yes" : "no" }}.png"> Cardinal</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 16, 5) ? "yes" : "no" }}.png"> Arch Mage</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 18, 5) ? "yes" : "no" }}.png"> Wind Hawk</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 9, 5) ? "yes" : "no" }}.png"> Imperial Guard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 11, 5) ? "yes" : "no" }}.png"> Biolo</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 13, 5) ? "yes" : "no" }}.png"> Abyss Chaser</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 15, 5) ? "yes" : "no" }}.png"> Inquisitor</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 17, 5) ? "yes" : "no" }}.png"> Elemental Master</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 19, 5) ? "yes" : "no" }}.png"> Troubadour</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 20, 5) ? "yes" : "no" }}.png"> Trouvere</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 1, 6) ? "yes" : "no" }}.png"> Taekwon</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 2, 6) ? "yes" : "no" }}.png"> Taekwon Master</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 3, 6) ? "yes" : "no" }}.png"> Soul Linker</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 4, 6) ? "yes" : "no" }}.png"> Ninja</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 5, 6) ? "yes" : "no" }}.png"> Kagerou/Oboro</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 6, 6) ? "yes" : "no" }}.png"> Gunslinger</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 7, 6) ? "yes" : "no" }}.png"> Rebel</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($data["item"]->job, $data["item"]->reqlv, 8, 6) ? "yes" : "no" }}.png"> Doram Race</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif
            @if (!is_null($data["quest"]))
                <tr>
                    <td colspan="3">
                        <div class="bgSmTitle smTitle">Quests</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                                    <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                                    <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                                    <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                                    <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                                    <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                                </tr>
                                @foreach ($data["quest"] as $questType => $questList)
                                    @if(!is_null($questList))
                                        <tr>
                                            <td class="bgSmTitle padded" colspan="6">{{ $questType }}</td>
                                        </tr>
                                        @foreach (array_chunk($questList->toArray(), 3) as $questChunk)
                                            <tr>
                                                @for ($i = 0; $i < 3; $i++)
                                                    @if (isset($questChunk[$i]))
                                                    <td class="bgLtRow1 padded"><a href="https://irowiki.org/wiki/{{ $questChunk[$i]["wiki"] }}">{{ $questChunk[$i]["name"] }}</a></td>
                                                    <td class="bgLtRow2 padded">{{ $questChunk[$i]["amount"] === 0 ? "(Varies)" : ($questChunk[$i]["amount"] === -1 ? "??" : "x ".number_format($questChunk[$i]["amount"])) }}</td>
                                                    @else
                                                        <td class="bgLtRow1 padded"></td>
                                                        <td class="bgLtRow2 padded"></td>
                                                    @endif
                                                @endfor
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif
            @if ($data["monster"])
                <tr>
                    <td colspan="3">
                        <div class="bgSmTitle smTitle">Monster Drops</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgHeader2 padded" style="width:4%;">Lv</td>
                                    <td class="bgHeader1 padded" style="width:20%;">Monster</td>
                                    <td class="bgHeader2 padded" style="width:10%;">Rate</td>
                                    <td class="bgHeader1 padded" style="width:30%;">Highest Spawn</td>
                                    <td class="bgHeader2 padded" style="width:12%;">Element</td>
                                    <td class="bgHeader1 padded" style="width:12%;">95% Flee</td>
                                    <td class="bgHeader2 padded" style="width:12%;">100% Hit</td>
                                </tr>
                                @foreach ($data["monster"] as $monster)
                                    <tr>
                                        <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                                        <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                                        <td class="bgLtRow2 padded">{{ ItemHelper::getDropRate($monster->rate, true) }}</td>
                                        <td class="bgLtRow1 padded">{!! html_entity_decode(ItemHelper::getMonsterSpawn($monster->id, $data["monsterSpawn"])) !!}</td>
                                        <td class="bgLtRow2 padded">{{ $monster->eleType !== -1 ? ItemHelper::getElementName($monster->eleType)." $monster->eleLvl" : "??" }}</td>
                                        <td class="bgLtRow1 padded">{{ $monster->flee }}</td>
                                        <td class="bgLtRow2 padded">{{ $monster->hit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endif
@else
<div class="bgMdTitle mdTitle">Error</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1 padded" style="font-size:11pt;">
                <table>
                    <tbody>
                        <tr>
                            <td class="padded" style="font-size:11pt;">
                                The item wasn't found in the database. Please contact us on Discord! <a href="https://irowiki.org/discord">https://irowiki.org/discord</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endif
@include('layout.footer')
@endsection