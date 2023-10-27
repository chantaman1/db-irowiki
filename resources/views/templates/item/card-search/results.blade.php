
<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">Results</div>
<table class="bgDkRow3">
    <tr>
        <td>&nbsp;
            @if (count($cardInfo) === 0)
                No items found
            @elseif (count($cardInfo) === 1)
                1 item found
            @else
                {{ count($cardInfo) }} items found
            @endif
        </td>
    </tr>
</table>
@if (count($cardInfo) > 0)
    <table class="bgLtTable">
        <table class="bgLtTable">
            <tbody>
                @foreach (array_chunk($cardInfo, 20) as $itemsChunk)
                    <tr>
                        <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                        <td class="bgHeader1 padded nowrap" style="width:15%;">Name</td>
                        <td class="bgHeader2 padded nowrap" style="width:15%;">Adjective</td>
                        <td class="bgHeader1 padded nowrap" style="width:10;">Gear</td>
                        <td class="bgHeader2 padded nowrap" style="width:55%;">Effect</td>
                    </tr>
                    @foreach ($itemsChunk as $item)
                        <tr>
                            <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $item["id"] }}.png"></td>
                            <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $item["id"] }}/">{{ $item["name"] }}</a></td>
                            <td class="bgLtRow2 padded">{{ $item["adjective"] }}</td>
                            <td class="bgLtRow1 padded">{{ ItemHelper::getItemTypeName(3, $item["subcat"]) }}</td>
                            <td class="bgLtRow2 padded">
                                <ul>
                                @foreach ($item["groupMain"] as $main)
                                    @if ($main["grp"] === 0)
                                        <li>{!! html_entity_decode(ItemHelper::formatSpecial($main["special"])) !!}</li>
                                    @else
                                        <li>{!! html_entity_decode(ItemHelper::formatSpecial($main["special"])) !!}:</li>
                                        <ul>
                                        @foreach ($item["groupList"] as $list)
                                            @if ($main["grp"] === $list["grp"])
                                                <li>{!! html_entity_decode(ItemHelper::formatSpecial($list["special"])) !!}</>
                                            @endif
                                        @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </table>
@endif