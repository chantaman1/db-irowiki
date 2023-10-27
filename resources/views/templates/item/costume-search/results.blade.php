<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">Results</div>
<table class="bgDkRow3">
    <tr>
        <td>&nbsp;
            @if (count($costumeInfo) === 0)
                No items found
            @elseif (count($costumeInfo) === 1)
                1 item found
            @else
                {{ count($costumeInfo) }} items found
            @endif
        </td>
    </tr>
</table>
@if (count($costumeInfo) > 0)
    <table class="bgLtTable">
        <table class="bgLtTable">
            <tbody>
                @foreach (array_chunk($costumeInfo->all(), 20) as $itemsChunk)
                    @if (!is_null($type) && $type === "1")
                        <tr>
                            <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                            <td class="bgHeader1 padded nowrap" style="width:30%;">Name</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Weight</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Req'd Lv</td>
                            <td class="bgHeader2 padded nowrap" style="width:10%;">Binding</td>
                            <td class="bgHeader1 padded nowrap" style="width:12%;">Position</td>
                        </tr>
                    @else
                        <tr>
                            <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                            <td class="bgHeader1 padded nowrap" style="width:38%;">Name</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Weight</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Req'd Lv</td>
                            <td class="bgHeader2 padded nowrap" style="width:14%;">Binding</td>
                        </tr>
                    @endif
                    @foreach ($itemsChunk as $item)
                        @if (!is_null($type) && $type === "1")
                            <tr>
                                <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $item->id }}.png"></td>
                                <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $item->id }}/">{{ $item->name }}</a></td>
                                <td class="bgLtRow2 padded">{{ $item->weight / 10 }}</td>
                                <td class="bgLtRow1 padded">{{ $item->reqlv }}</td>
                                <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($item->binding) }}</td>
                                <td class="bgLtRow1 padded">{{ ItemHelper::getHeadgearType($item->position) }}</td>
                            </tr>
                        @else
                            <tr>
                                <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $item->id }}.png"></td>
                                <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $item->id }}/">{{ $item->name }}</a></td>
                                <td class="bgLtRow2 padded">{{ $item->weight / 10 }}</td>
                                <td class="bgLtRow1 padded">{{ $item->reqlv }}</td>
                                <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($item->binding) }}</td>
                            </tr>
                        @endif
                        @if (!is_null($costumeSpecial) && count($costumeSpecial) > 0)
                            <tr>
                                <td class="bgLtRow4 padded centered"></td>
                                <td class="bgLtRow1 padded" colspan="10">{!! html_entity_decode(ItemHelper::formatSpecial($costumeSpecial[$item->id]["description"])) !!}</td>
                            </tr>
                            @foreach ($costumeSpecial[$item->id]["special"] as $special)
                                <tr>
                                    <td class="bgLtRow4 padded centered"></td>
                                    <td class="bgLtRow1 padded" colspan="10">{!! html_entity_decode(ItemHelper::formatSpecial($special)) !!}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </table>
@endif