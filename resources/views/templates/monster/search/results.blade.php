@if (!is_null($monsters))
<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">Results</div>
<table class="bgDkRow3">
    <tbody>
        <tr>
            <td>&nbsp;
                @if (count($monsters) === 0)
                    No monsters found
                @elseif (count($monsters) === 1)
                    1 monster found
                @else
                    {{ count($monsters) }} monsters found
                @endif
            </td>
        </tr>
    </tbody>
</table>
<table class="bgLtTable">
    <tbody>
        @foreach (array_chunk($monsters->all(), $header) as $monstersChunk)
            @if ($ltype === "2")
                <tr>
                    <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                    <td class="bgHeader2 padded nowrap" style="width:4%;">Lv</td>
                    <td class="bgHeader1 padded nowrap" style="width:18%;">Name</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">HP</td>
                    <td class="bgHeader1 padded nowrap" style="width:12%;">Attack</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Size</td>
                    <td class="bgHeader1 padded nowrap" style="width:10%;">Race</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Element</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Def</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">MDef</td>
                    <td class="bgHeader1 padded nowrap" style="width:9%;">Base Exp / HP</td>
                    <td class="bgHeader2 padded nowrap" style="width:9%;">Job Exp / HP</td>
                </tr>
                @foreach ($monstersChunk as $monster)
                    <tr>
                        <td class="bgLtRow3 padded centered">
                            @if (($monster->ai & 0x1) === 0x1 || ($monster->ai & 0x2) === 0x2)
                                <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
                            @elseif (($monster->ai & 0x8) === 0x8)
                                <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
                            @elseif (($monster->ai & 0x10) === 0x10)
                                <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
                            @endif
                        </td>
                        <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                        <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->hp) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->atkMin) }} ~ {{ number_format($monster->atkMax) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::sizeName($monster->size) }}</td>
                        <td class="bgLtRow1 padded">{{ MiscHelper::raceName($monster->race) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::elementName($monster->eleType) }} {{ $monster->eleLvl !== -1 ? $monster->eleLvl : "??" }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->def) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->mdef) }}</td>
                        <td class="bgLtRow1 padded">{{ round($monster->expBase / $monster->hp, 4) }}</td>
                        <td class="bgLtRow2 padded">{{ round($monster->expJob / $monster->hp, 4) }}</td>
                    </tr>
                @endforeach
            @elseif ($ltype === "3")
                <tr>
                    <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                    <td class="bgHeader2 padded nowrap" style="width:4%;">Lv</td>
                    <td class="bgHeader1 padded nowrap" style="width:18%;">Name</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">HP</td>
                    <td class="bgHeader1 padded nowrap" style="width:12%;">Attack</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Size</td>
                    <td class="bgHeader1 padded nowrap" style="width:10%;">Race</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Element</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Def</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">MDef</td>
                    <td class="bgHeader1 padded nowrap" style="width:9%;">95% Flee</td>
                    <td class="bgHeader2 padded nowrap" style="width:9%;">100% Hit</td>
                </tr>
                @foreach ($monstersChunk as $monster)
                    <tr>
                        <td class="bgLtRow3 padded centered">
                            @if (($monster->ai & 0x1) === 0x1 || ($monster->ai & 0x2) === 0x2)
                                <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
                            @elseif (($monster->ai & 0x8) === 0x8)
                                <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
                            @elseif (($monster->ai & 0x10) === 0x10)
                                <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
                            @endif
                        </td>
                        <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                        <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->hp) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->atkMin) }} ~ {{ number_format($monster->atkMax) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::sizeName($monster->size) }}</td>
                        <td class="bgLtRow1 padded">{{ MiscHelper::raceName($monster->race) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::elementName($monster->eleType) }} {{ $monster->eleLvl !== -1 ? $monster->eleLvl : "??" }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->def) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->mdef) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format(170 + $monster->level + $monster->statDex) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format(200 + $monster->level + $monster->statAgi) }}</td>
                    </tr>
                @endforeach
            @elseif ($ltype === "4")
                <tr>
                    <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                    <td class="bgHeader2 padded nowrap" style="width:4%;">Lv</td>
                    <td class="bgHeader1 padded nowrap" style="width:16%;">Name</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">HP</td>
                    <td class="bgHeader1 padded nowrap" style="width:10%;">Attack</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">Size</td>
                    <td class="bgHeader1 padded nowrap" style="width:8%;">Race</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">Element</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Def</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">MDef</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Agi</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">Vit</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Int</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">Dex</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Luk</td>
                </tr>
                @foreach ($monstersChunk as $monster)
                    <tr>
                        <td class="bgLtRow3 padded centered">
                            @if (($monster->ai & 0x1) === 0x1 || ($monster->ai & 0x2) === 0x2)
                                <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
                            @elseif (($monster->ai & 0x8) === 0x8)
                                <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
                            @elseif (($monster->ai & 0x10) === 0x10)
                                <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
                            @endif
                        </td>
                        <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                        <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->hp) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->atkMin) }} ~ {{ number_format($monster->atkMax) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::sizeName($monster->size) }}</td>
                        <td class="bgLtRow1 padded">{{ MiscHelper::raceName($monster->race) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::elementName($monster->eleType) }} {{ $monster->eleLvl !== -1 ? $monster->eleLvl : "??" }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->def) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->mdef) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->statAgi) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->statVit) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->statInt) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->statDex) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->statLuk) }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                    <td class="bgHeader2 padded nowrap" style="width:4%;">Lv</td>
                    <td class="bgHeader1 padded nowrap" style="width:18%;">Name</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">HP</td>
                    <td class="bgHeader1 padded nowrap" style="width:12%;">Attack</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Size</td>
                    <td class="bgHeader1 padded nowrap" style="width:10%;">Race</td>
                    <td class="bgHeader2 padded nowrap" style="width:8%;">Element</td>
                    <td class="bgHeader1 padded nowrap" style="width:6%;">Def</td>
                    <td class="bgHeader2 padded nowrap" style="width:6%;">MDef</td>
                    <td class="bgHeader1 padded nowrap" style="width:9%;">Base Exp</td>
                    <td class="bgHeader2 padded nowrap" style="width:9%;">Job Exp</td>
                </tr>
                @foreach ($monstersChunk as $monster)
                    <tr>
                        <td class="bgLtRow3 padded centered">
                            @if (($monster->ai & 0x1) === 0x1 || ($monster->ai & 0x2) === 0x2)
                                <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
                            @elseif (($monster->ai & 0x8) === 0x8)
                                <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
                            @elseif (($monster->ai & 0x10) === 0x10)
                                <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
                            @endif
                        </td>
                        <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                        <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->hp) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->atkMin) }} ~ {{ number_format($monster->atkMax) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::sizeName($monster->size) }}</td>
                        <td class="bgLtRow1 padded">{{ MiscHelper::raceName($monster->race) }}</td>
                        <td class="bgLtRow2 padded">{{ MiscHelper::elementName($monster->eleType) }} {{ $monster->eleLvl !== -1 ? $monster->eleLvl : "??" }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->def) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->mdef) }}</td>
                        <td class="bgLtRow1 padded">{{ number_format($monster->expBase) }}</td>
                        <td class="bgLtRow2 padded">{{ number_format($monster->expJob) }}</td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>
@endif