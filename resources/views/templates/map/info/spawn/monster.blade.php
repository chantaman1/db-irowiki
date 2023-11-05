<tr>
    @php
        $color = MapHelper::toggleColor();
    @endphp
    <td class="bgLtRow{{ $color + 3 }} centered {{ $rowSpan }}">
        @if (MapHelper::isAggressiveMonster($ai))
            <img src="https://db.irowiki.org/image/reddot.png" title="Aggresive">
        @elseif (MapHelper::isAssistiveMonster($ai))
            <img src="https://db.irowiki.org/image/bluedot.png" title="Assist">
        @elseif (MapHelper::isCastSensorMonster($ai))
            <img src="https://db.irowiki.org/image/purpledot.png" title="Cast sensor">
        @endif
    </td>
    <td class="bgLtRow{{ $color + 1 }} padded {{ $rowSpan }}">
        {{ $level }}
    </td>
    <td class="bgLtRow{{ $color }} padded {{ $rowSpan }}">
        {{ $name }}
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
