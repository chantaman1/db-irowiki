@extends('layout.app')

@section('content')
@if ($data === null || $data["item"] !== null)
<div class="bgMdTitle mdTitle">Item Info</div>
<table class="bgDkRow2">
    <tr>
        <td class="padded nowrap" style="width:70%;">
            <form class="blockNormal" onsubmit="return changeItemPage();">
                <select id="categoryMenu" style="width:120px;" onchange="listSubCatMenu( {{ $subMenuCats }} );">
                    @if ($menuCats != null)
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
@if ($data !== null && $data["item"] !== null)
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
                    @if ($data["item"]->description !== null || $data["itemSpecialMain"] !== null || $data["item"]->notes !== null)
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow1 padded">{{ $data["item"]->description !== null && $data["item"]->description !== "NULL" && $data["item"]->category !== 3 ? $data["item"]->description : "" }}
                                        @if ($data["itemSpecialMain"] !== null)
                                            @if ($data["item"]->description !== null && $data["item"]->description !== "NULL" && $data["item"]->category !== 3)
                                                <hr>
                                            @endif
                                            <ul>
                                                @foreach ($data["itemSpecialMain"] as $specialMain)
                                                    <li>{{ $specialMain->special }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if ($data["item"]->notes !== null)
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
                                <td class="bgLtRow3 padded infoTitle">Type</td>
                                <td class="bgLtRow1 padded infoText">{{ ItemHelper::getItemTypeName($data["item"]->category) }}</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded infoTitle">Subtype</td>
                                <td class="bgLtRow2 padded infoText">{{ ItemHelper::getItemTypeName($data["item"]->category, $data["item"]->subcat) }}</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded infoTitle">Weight</td>
                                <td class="bgLtRow1 padded infoText">{{ $data["item"]->weight !== -1 ? $data["item"]->weight / 10 : "??" }}</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            @if ($data["item"]->category === 4 || $data["item"]->category === 5 || $data["item"]->category === 7)
                                <tr>
                                    <td class="bgLtRow4 padded infoTitle"><a href="http://irowiki.org/wiki/Buying_Store">Buy Shop</a></td>
                                    @if ($data["item"]->buyable === 1)
                                        <td class="bgLtRow2 padded infoText"><img src="https://db.irowiki.org/image/yes.png"> Yes</td>
                                    @else
                                        <td class="bgLtRow2 padded infoText"><img src="https://db.irowiki.org/image/no.png"> No</td>
                                    @endif
                                </tr>
                            @endif
                            @if ($data["item"]->category === 1 || $data["item"]->category === 9)
                                @if (isset($data["weapon"]->element))
                                    <tr>
                                        <td class="bgLtRow4 padded infoTitle">Element</td>
                                        <td class="bgLtRow2 padded infoText">{{ ItemHelper::getElementName($data["weapon"]->element) }}</td>
                                    </tr>
                                @endif
                                @if (isset($data["weapon"]->level))
                                    <tr>
                                        <td class="bgLtRow4 padded infoTitle">Weapon Level</td>
                                        <td class="bgLtRow2 padded infoText">{{ $data["weapon"]->level !== -1 ? $data["weapon"]->level : "??" }}</td>
                                    </tr>
                                @endif
                            @endif
                            @if (isset($data["item"]->reqlv))
                                <tr>
                                    <td class="bgLtRow4 padded infoTitle">Required Level</td>
                                    <td class="bgLtRow2 padded infoText">{{ $data["item"]->reqlv !== -1 ? $data["item"]->reqlv : "??" }}</td>
                                </tr>
                            @endif
                            @if ($data["item"]->category === 3)
                                @if ($data["adjective"] !== null)
                                    <tr>
                                        <td class="bgLtRow3 padded infoTitle">Adjective</td>
                                        <td class="bgLtRow1 padded infoText">{{ $data["adjective"]->adjective }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="bgLtRow3 padded infoTitle">Illustration</td>
                                    <td class="bgLtRow1 padded infoText"><a href="javascript:openCardIllust({{ $data["item"]->id }});">(Click to View)</a></td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->upgrade))
                                <tr>
                                    <td class="bgLtRow3 padded infoTitle">Upgradable</td>
                                    <td class="bgLtRow1 padded infoText">{{ $data["item"]->upgrade === 1 ? "Yes" : "No" }}</td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->damage))
                                <tr>
                                    <td class="bgLtRow3 padded infoTitle">Upgradable</td>
                                    <td class="bgLtRow1 padded infoText">{{ $data["item"]->upgrade === 1 ? "Yes" : "No" }}</td>
                                </tr>
                            @endif
                            @if (isset($data["item"]->binding) && $data["item"]->binding !== 0)
                                <tr>
                                    <td class="bgLtRow3 padded infoTitle">Binding</td>
                                    <td class="bgLtRow1 padded infoText">{{ ItemHelper::getBindingName($data["item"]->binding) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </td>
                <td style="width:33.3%; vertical-align:top;">
                    @if ($data["itemSpecialStats"] !== null)
                    <div class="bgSmTitle smTitle">Stats</div>
                    <table class="bgLtTable">
                        <tbody>
                            @foreach ($data["itemSpecialStats"] as $stats)
                                <tr>
                                    <td class="bgLtRow3 padded infoTitle">{{ ItemHelper::getItemStat($stats->special, true) }}</td>
                                    <td class="bgLtRow1 padded infoText">{{ ItemHelper::getItemStat($stats->special) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Size Modifiers</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded infoTitle">Small</td>
                                <td class="bgLtRow1 padded infoText">75%</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded infoTitle">Medium</td>
                                <td class="bgLtRow2 padded infoText">75%</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded infoTitle">Large</td>
                                <td class="bgLtRow1 padded infoText">100%</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width:33.3%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">NPC Prices</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded infoTitle">Buying Price</td>
                                <td class="bgLtRow1 padded infoText">--</td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded infoTitle">Selling Price</td>
                                <td class="bgLtRow2 padded infoText">0 Z</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>
            @if ($data["item"]->job !== null)
                <tr>
                    <td colspan="3">
                        <div class="bgSmTitle smTitle">Equippable By</div>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>
                                    <td class="bgLtRow1">
                                        <table class="bgLtRow1">
                                            <tbody>
                                                <tr>
                                                    <td class="padded"><img src="https://db.irowiki.org/image/no.png"> Novice</td>
                                                    <td class="padded"><img src="https://db.irowiki.org/image/no.png"> Super Novice</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Swordman</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Merchant</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Thief</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Acolyte</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Mage</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Archer</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Blacksmith</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Assassin</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Priest</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Wizard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Hunter</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Crusader</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Alchemist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Rogue</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Monk</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Sage</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Bard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Dancer</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Lord Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Master Smith</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Assassin Cross</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> High Priest</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> High Wizard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Sniper</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Paladin</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Biochemist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Stalker</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Champion</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Scholar</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Minstrel</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Gypsy</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Rune Knight</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Mechanic</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Guillotine Cross</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Arch Bishop</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Warlock</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Ranger</td>
                                                    <td class="padded" style="width:14%;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/yes.png"> Royal Guard</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Geneticist</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Shadow Chaser</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Sura</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Sorcerer</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Maestro</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Wanderer</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Taekwon</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Taekwon Master</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Soul Linker</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Ninja</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Kagerou/Oboro</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Gunslinger</td>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Rebel</td>
                                                </tr>
                                                <tr>
                                                    <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/no.png"> Doram Race</td>
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