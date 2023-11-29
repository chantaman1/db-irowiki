<tr>
    @php
        $color = MapHelper::toggleColor();
        $mob = MapHelper::shortenMonsterName($monster->name2);
    @endphp
    <td class="bgLtRow{{ $color + 3 }} centered {{ $rowSpan }}">
        @if (MapHelper::isAggressiveMonster($monster->ai))
            <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
        @elseif (MapHelper::isAssistiveMonster($monster->ai))
            <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
        @elseif (MapHelper::isCastSensorMonster($monster->ai))
            <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
        @endif
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $level }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        @if (empty($mob['title']))
            <a href="/db/monster-info/{{ $monster->id }}/">{{ $mob['name'] }}</a>
        @else
            <a href="/db/monster-info/{{ $monster->id }}/" title="{{ $mob['title'] }}"> {{ $mob['name'] }}</a>
        @endif
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $amount }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        {{ $respawn }}
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $hp }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        {{ $eleType }}
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $race }}
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $size }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        {{ $def }}
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $mdef }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        {{ $flee }}
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $hit }}
    </td>
</tr>
