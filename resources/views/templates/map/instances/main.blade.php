<table class="bgLtTable">
    @foreach(array_chunk($instances, 2, true) as $instancePair)
        @php
            $names = array_keys($instancePair);
            $name = $names[0];
            $nextName = isset($names[1]) ? $names[1] : null;
        @endphp
        <tr>
            <td class="bgLtRow1 padded chartName">{{ $name }}</td>
            @foreach($instancePair[$name] as $instanceValue)
                <td class="bgLtRow1 chartImage">
                    <a href="/db/map-info/{{ $instanceValue }}/">
                        <img src="https://db.irowiki.org/image/map/thumb/{{ $instanceValue }}.png" alt="">
                    </a>
                </td>
            @endforeach

            @if(count($instancePair[$name]) < 7)
                <td colspan="{{ 7 - count($instancePair[$name]) }}">&nbsp;</td>
            @endif
            
            @if($nextName)
                <td class="bgLtRow2 padded chartName">{{ $nextName }}</td>
                @foreach($instancePair[$nextName] as $instanceValue)
                    <td class="bgLtRow1 chartImage">
                        <a href="/db/map-info/{{ $instanceValue }}/">
                            <img src="https://db.irowiki.org/image/map/thumb/{{ $instanceValue }}.png" alt="">
                        </a>
                    </td>
                @endforeach
                @if(count($instancePair[$nextName]) < 7)
                    <td colspan="{{ 7 - count($instancePair[$nextName]) }}">&nbsp;</td>
                @endif
            @endif
        </tr>
    @endforeach
</table>