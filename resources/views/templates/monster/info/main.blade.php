<div id="mainInfo">
    <div class="bgSmTitle smTitle">Main</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded" style="width:33%;">{{ MiscHelper::sizeName($monster->size) }}</td>
                <td class="bgLtRow2 padded" style="width:33%;">{{ MiscHelper::raceName($monster->race) }}</td>
                <td class="bgLtRow1 padded" style="width:33%;">{{ MiscHelper::elementName($monster->eleType) }} {{ $monster->eleLvl }}</td>
            </tr>
        </tbody>
    </table>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow3 padded statTitle">Level</td>
                <td class="bgLtRow1 padded statText">{{ $monster->level }}</td>
                <td class="bgLtRow3 padded statTitle">Def</td>
                <td class="bgLtRow1 padded statText">
                    <div class="defStat">{{ MonsterHelper::defBonus($monster->def, $monster->level, $monster->statVit) }}</div>
                    <div class="defPercent">{{ MonsterHelper::defPercent($monster->def) }}</div>
                </td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded statTitle">HP</td>
                <td class="bgLtRow2 padded statText">{{ $monster->hp !== -1 ? number_format($monster->hp) : "??" }}</td>
                <td class="bgLtRow4 padded statTitle">MDef</td>
                <td class="bgLtRow2 padded statText">
                    <div class="defStat">{{ $monster->mdef !== -1 ? number_format($monster->mdef) : "??" }}</div>
                    <div class="defPercent">{{ MonsterHelper::mdefPercent($monster->mdef) }}</div>
                </td>
            </tr>
            <tr>
                <td class="bgLtRow3 padded statTitle">Attack</td>
                <td class="bgLtRow1 padded statText">{{ $monster->atkMin !== -1 ? number_format($monster->atkMin) . " ~ " . number_format($monster->atkMax) : "??" }}</td>
                <td class="bgLtRow3 padded statTitle">Range</td>
                <td class="bgLtRow1 padded statText">{{ $monster->atkRange !== -1 ? $monster->atkRange : "??" }} {{ $monster->atkRange !== -1 ? ( $monster->atkRange > 1 ? "cells" : "cell" ) : "" }}</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded statTitle">Aspd</td>
                <td class="bgLtRow2 padded statText">{{ $monster->aspd !== -1 ? 200 - ($monster->aspd / 20) : "??" }}</td>
                <td class="bgLtRow4 padded statTitle">Move Speed</td>
                <td class="bgLtRow2 padded statText">{{ $monster->mspeed !== -1 ? $monster->mspeed : "??" }} ms</td>
            </tr>
            <tr></tr>
            <tr>
                <td class="bgLtRow3 padded statTitle">Base Exp</td>
                <td class="bgLtRow1 padded statText">{{ $monster->expBase !== -1 ? number_format($monster->expBase) : "??" }}</td>
                <td class="bgLtRow3 padded statTitle">Base Exp per HP</td>
                <td class="bgLtRow1 padded statText">{{ MonsterHelper::expPerHP($monster->expBase, $monster->hp, false) }}</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded statTitle">Job Exp</td>
                <td class="bgLtRow2 padded statText">{{ $monster->expJob !== -1 ? number_format($monster->expJob) : "??" }}</td>
                <td class="bgLtRow4 padded statTitle">Job Exp per HP</td>
                <td class="bgLtRow2 padded statText">{{ MonsterHelper::expPerHP($monster->expJob, $monster->hp, true) }}</td>
            </tr>
            <tr></tr>
            <tr>
                <td class="bgLtRow3 padded statTitle">100% Hit</td>
                <td class="bgLtRow1 padded statText">{{ $monster->statAgi !== -1 ? 200 + $monster->level + $monster->statAgi : "??" }}</td>
                <td class="bgLtRow3 padded statTitle">95% Flee</td>
                <td class="bgLtRow1 padded statText">{{ $monster->statDex !== -1 ? 170 + $monster->level + $monster->statDex : "??" }}</td>
            </tr>
        </tbody>
    </table>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow3 padded baseStat">Agi</td>
                <td class="bgLtRow4 padded baseStat">Vit</td>
                <td class="bgLtRow3 padded baseStat">Int</td>
                <td class="bgLtRow4 padded baseStat">Dex</td>
                <td class="bgLtRow3 padded baseStat">Luk</td>
            </tr>
            <tr>
                <td class="bgLtRow1 padded baseStat">{{ $monster->statAgi !== -1 ? $monster->statAgi : "??" }}</td>
                <td class="bgLtRow2 padded baseStat">{{ $monster->statVit !== -1 ? $monster->statVit : "??" }}</td>
                <td class="bgLtRow1 padded baseStat">{{ $monster->statInt !== -1 ? $monster->statInt : "??" }}</td>
                <td class="bgLtRow2 padded baseStat">{{ $monster->statDex !== -1 ? $monster->statDex : "??" }}</td>
                <td class="bgLtRow1 padded baseStat">{{ $monster->statLuk !== -1 ? $monster->statLuk : "??" }}</td>
            </tr>
        </tbody>
    </table>
</div>