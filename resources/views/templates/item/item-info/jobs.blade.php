@if (!is_null($itemData->job))
    <tr>
        <td colspan="3">
            @if ($itemData->category === 1 || $itemData->category === 2)
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
                                        <td class="padded"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 1, 1) ? "yes" : "no" }}.png"> Novice</td>
                                        <td class="padded"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 1, 1) ? "yes" : "no" }}.png"> Super Novice</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 2, 1) ? "yes" : "no" }}.png"> Swordman</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 3, 1) ? "yes" : "no" }}.png"> Merchant</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 4, 1) ? "yes" : "no" }}.png"> Thief</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 5, 1) ? "yes" : "no" }}.png"> Acolyte</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 6, 1) ? "yes" : "no" }}.png"> Mage</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 7, 1) ? "yes" : "no" }}.png"> Archer</td>
                                        <td class="padded" style="width:14%;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 8, 2) ? "yes" : "no" }}.png"> Knight</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 10, 2) ? "yes" : "no" }}.png"> Blacksmith</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 12, 2) ? "yes" : "no" }}.png"> Assassin</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 14, 2) ? "yes" : "no" }}.png"> Priest</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 16, 2) ? "yes" : "no" }}.png"> Wizard</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 18, 2) ? "yes" : "no" }}.png"> Hunter</td>
                                        <td class="padded" style="width:14%;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 9, 2) ? "yes" : "no" }}.png"> Crusader</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 11, 2) ? "yes" : "no" }}.png"> Alchemist</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 13, 2) ? "yes" : "no" }}.png"> Rogue</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 15, 2) ? "yes" : "no" }}.png"> Monk</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 17, 2) ? "yes" : "no" }}.png"> Sage</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 19, 2) ? "yes" : "no" }}.png"> Bard</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 20, 2) ? "yes" : "no" }}.png"> Dancer</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 8, 3) ? "yes" : "no" }}.png"> Lord Knight</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 10, 3) ? "yes" : "no" }}.png"> Master Smith</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 12, 3) ? "yes" : "no" }}.png"> Assassin Cross</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 14, 3) ? "yes" : "no" }}.png"> High Priest</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 16, 3) ? "yes" : "no" }}.png"> High Wizard</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 18, 3) ? "yes" : "no" }}.png"> Sniper</td>
                                        <td class="padded" style="width:14%;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 9, 3) ? "yes" : "no" }}.png"> Paladin</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 11, 3) ? "yes" : "no" }}.png"> Biochemist</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 13, 3) ? "yes" : "no" }}.png"> Stalker</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 15, 3) ? "yes" : "no" }}.png"> Champion</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 17, 3) ? "yes" : "no" }}.png"> Scholar</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 19, 3) ? "yes" : "no" }}.png"> Minstrel</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 20, 3) ? "yes" : "no" }}.png"> Gypsy</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 8, 4) ? "yes" : "no" }}.png"> Rune Knight</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 10, 4) ? "yes" : "no" }}.png"> Mechanic</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 12, 4) ? "yes" : "no" }}.png"> Guillotine Cross</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 14, 4) ? "yes" : "no" }}.png"> Arch Bishop</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 16, 4) ? "yes" : "no" }}.png"> Warlock</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 18, 4) ? "yes" : "no" }}.png"> Ranger</td>
                                        <td class="padded" style="width:14%;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 9, 4) ? "yes" : "no" }}.png"> Royal Guard</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 11, 4) ? "yes" : "no" }}.png"> Geneticist</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 13, 4) ? "yes" : "no" }}.png"> Shadow Chaser</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 15, 4) ? "yes" : "no" }}.png"> Sura</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 17, 4) ? "yes" : "no" }}.png"> Sorcerer</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 19, 4) ? "yes" : "no" }}.png"> Maestro</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 20, 4) ? "yes" : "no" }}.png"> Wanderer</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job,$itemData->reqlv, 8, 5) ? "yes" : "no" }}.png"> Dragon Knight</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 10, 5) ? "yes" : "no" }}.png"> Meister</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 12, 5) ? "yes" : "no" }}.png"> Shadow Cross</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 14, 5) ? "yes" : "no" }}.png"> Cardinal</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 16, 5) ? "yes" : "no" }}.png"> Arch Mage</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 18, 5) ? "yes" : "no" }}.png"> Wind Hawk</td>
                                        <td class="padded" style="width:14%;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 9, 5) ? "yes" : "no" }}.png"> Imperial Guard</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 11, 5) ? "yes" : "no" }}.png"> Biolo</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 13, 5) ? "yes" : "no" }}.png"> Abyss Chaser</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 15, 5) ? "yes" : "no" }}.png"> Inquisitor</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 17, 5) ? "yes" : "no" }}.png"> Elemental Master</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 19, 5) ? "yes" : "no" }}.png"> Troubadour</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 20, 5) ? "yes" : "no" }}.png"> Trouvere</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 1, 6) ? "yes" : "no" }}.png"> Taekwon</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 2, 6) ? "yes" : "no" }}.png"> Taekwon Master</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 3, 6) ? "yes" : "no" }}.png"> Soul Linker</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 4, 6) ? "yes" : "no" }}.png"> Ninja</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 6, 6) ? "yes" : "no" }}.png"> Kagerou/Oboro</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 5, 6) ? "yes" : "no" }}.png"> Gunslinger</td>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 7, 6) ? "yes" : "no" }}.png"> Rebel</td>
                                    </tr>
                                    <tr>
                                        <td class="padded" style="width:14%;"><img src="https://db.irowiki.org/image/{{ ItemHelper::canJobEquip($itemData->job, $itemData->reqlv, 8, 6) ? "yes" : "no" }}.png"> Doram Race</td>
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