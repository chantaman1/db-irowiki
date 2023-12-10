@if (!is_null($drops))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Drops</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    <table>
                        <tbody>
                            @foreach (array_chunk($drops->all(), 2) as $dropChunk)
                                <tr>
                                    @foreach ($dropChunk as $index => $drop)
                                        <td class="dropImg"><img src="https://db.irowiki.org/image/item/{{ $drop->item }}.png"></td>
                                        <td class="dropItem"><a href="/db/item-info/{{ $drop->item }}/">{{ $drop->name }}</a></td>
                                        <td class="dropRate {{ $drop->flag ? "highlight" : "" }}">{{ MiscHelper::dropRate($drop->rate, true) }}</td>
                                        @if ($index === 0)
                                            <td class="dropDiv">&nbsp;</td>
                                        @endif  
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endif