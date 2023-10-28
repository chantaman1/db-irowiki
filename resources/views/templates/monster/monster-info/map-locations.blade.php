@if (!is_null($mapInfo))
    <div class="mdSeperator">&nbsp;</div>
    <table class="bgSmTitle">
        <tbody>
            <tr>
                <td class="smTitle">&nbsp;Map Locations</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            @foreach (array_chunk($mapInfo->all(), 5) as $mapChunk)
                <tr>
                    @foreach($mapChunk as $map)
                        <td class="mapInfo">
                            <a href="/db/map-info/{{ $map->id }}/"><div class="bgSmTitle padded">{{ $map->name }}</div></a>
                            <table class="bgLtTable">
                                <tbody>
                                    <tr>
                                        <td class="bgLtRow5 mapImage" rowspan="2">
                                            <a href="/db/map-info/{{ $map->id }}/"><img style="width:42px; height:42px;" src="https://db.irowiki.org/image/map/thumb/{{ $map->id }}.png"></a>
                                        </td>
                                        <td class="bgLtRow3 padded mapSpawns">
                                            {{ $map->catname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bgLtRow1 padded mapSpawns">
                                            {{ MonsterHelper::formatSpawnAmount($map->amount, $map->flag) }}, {{ MonsterHelper::formatRespawn($map->time) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    @endforeach
                    @if (5 - count($mapChunk) > 0)
                        <td colspan="{{ 5 - count($mapChunk) }}">&nbsp;</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endif