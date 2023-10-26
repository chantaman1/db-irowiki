<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">Results</div>
<table class="bgDkRow3">
    <tr>
        <td>&nbsp;
            @if (count($consumeInfo) === 0)
                No items found
            @elseif (count($consumeInfo) === 1)
                1 item found
            @else
                {{ count($consumeInfo) }} items found
            @endif
        </td>
    </tr>
</table>
@if (count($consumeInfo) > 0)
    <table class="bgLtTable">
        <table class="bgLtTable">
            <tbody>
                @foreach (array_chunk($consumeInfo->all(), 20) as $itemsChunk)
                    <tr>
                        <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                        <td class="bgHeader1 padded nowrap" style="width:38%;">Name</td>
                        <td class="bgHeader2 padded nowrap" style="width:7.5%;">Weight</td>
                        <td class="bgHeader1 padded nowrap" style="width:7.5%;">Req'd Lv</td>
                        <td class="bgHeader2 padded nowrap" style="width:7.5%;">HP</td>
                        <td class="bgHeader1 padded nowrap" style="width:7.5%;">SP</td>
                        <td class="bgHeader2 padded nowrap" style="width:7.5%;">Price</td>
                        <td class="bgHeader2 padded nowrap" style="width:7.5%;">NPC Buyable?</td>
                        <td class="bgHeader2 padded nowrap" style="width:7.5%;">Buy Shop?</td>
                        <td class="bgHeader1 padded nowrap" style="width:14%;">Binding</td>
                    </tr>
                    @foreach ($itemsChunk as $item)
                        <tr>
                            <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $item->id }}.png"></td>
                            <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $item->id }}/">{{ $item->name }}</a></td>
                            <td class="bgLtRow2 padded">{{ $item->weight / 10 }}</td>
                            <td class="bgLtRow1 padded">{{ $item->reqlv }}</td>
                            <td class="bgLtRow1 padded">{{ $item->hp }}</td>
                            <td class="bgLtRow1 padded">{{ $item->sp }}</td>
                            <td class="bgLtRow1 padded">{{ $item->price }}</td>
                            <td class="bgLtRow2 padded centered"><img src="https://db.irowiki.org/image/{{ $item->buyable ? "yes" : "no" }}.png"></td>
                            <td class="bgLtRow1 padded centered"><img src="https://db.irowiki.org/image/{{ $item->buyshop ? "yes" : "no" }}.png"></td>
                            <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($item->binding) }}</td>
                        </tr>
                        @if (!is_null($consumeSpecial) && count($consumeSpecial) > 0)
                            <tr>
                                <td class="bgLtRow4 padded centered"></td>
                                <td class="bgLtRow1 padded" colspan="10">{!! html_entity_decode(ItemHelper::formatSpecial($consumeSpecial[$item->id]["description"])) !!}</td>
                            </tr>
                            @foreach ($consumeSpecial[$item->id]["special"] as $special)
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