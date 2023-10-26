<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">Results</div>
<table class="bgDkRow3">
    <tr>
        <td>&nbsp;
            @if (count($gearInfo) === 0)
                No items found
            @elseif (count($gearInfo) === 1)
                1 item found
            @else
                {{ count($gearInfo) }} items found
            @endif
        </td>
    </tr>
</table>
@if (count($gearInfo) > 0)
    <table class="bgLtTable">
        <table class="bgLtTable">
            <tbody>
                @foreach (array_chunk($gearInfo->all(), 20) as $itemsChunk)
                    @if (!is_null($type) && $type === "1")
                        <tr>
                            <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                            <td class="bgHeader1 padded nowrap" style="width:30%;">Name</td>
                            <td class="bgHeader2 padded nowrap" style="width:8%;">Def</td>
                            <td class="bgHeader1 padded nowrap" style="width:8%;">MDef</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Weight</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Req'd Lv</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Upgrade</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Break</td>
                            <td class="bgHeader2 padded nowrap" style="width:10%;">Binding</td>
                            <td class="bgHeader1 padded nowrap" style="width:12%;">Position</td>
                        </tr>
                    @else
                        <tr>
                            <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                            <td class="bgHeader1 padded nowrap" style="width:38%;">Name</td>
                            <td class="bgHeader2 padded nowrap" style="width:8%;">Def</td>
                            <td class="bgHeader1 padded nowrap" style="width:8%;">MDef</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Weight</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Req'd Lv</td>
                            <td class="bgHeader2 padded nowrap" style="width:7.5%;">Upgrade</td>
                            <td class="bgHeader1 padded nowrap" style="width:7.5%;">Break</td>
                            <td class="bgHeader2 padded nowrap" style="width:14%;">Binding</td>
                        </tr>
                    @endif
                    @foreach ($itemsChunk as $gear)
                        @if (!is_null($type) && $type === "1")
                            <tr>
                                <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $gear->id }}.png"></td>
                                <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $gear->id }}/">{{ $gear->name }}</a></td>
                                <td class="bgLtRow2 padded">{{ $gear->def2 }}</td>
                                <td class="bgLtRow1 padded">{{ $gear->mdef2 }}</td>
                                <td class="bgLtRow2 padded">{{ $gear->weight / 10 }}</td>
                                <td class="bgLtRow2 padded">{{ $gear->reqlv }}</td>
                                <td class="bgLtRow2 padded centered"><img src="https://db.irowiki.org/image/{{ $gear->upgrade ? "yes" : "no" }}.png"></td>
                                <td class="bgLtRow1 padded centered"><img src="https://db.irowiki.org/image/{{ $gear->damage ? "yes" : "no" }}.png"></td>
                                <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($gear->binding) }}</td>
                                <td class="bgLtRow1 padded">{{ ItemHelper::getHeadgearType($gear->position) }}</td>
                            </tr>
                        @else
                            <tr>
                                <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $gear->id }}.png"></td>
                                <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $gear->id }}/">{{ $gear->name }}</a></td>
                                <td class="bgLtRow2 padded">{{ $gear->def2 }}</td>
                                <td class="bgLtRow1 padded">{{ $gear->mdef2 }}</td>
                                <td class="bgLtRow2 padded">{{ $gear->weight / 10 }}</td>
                                <td class="bgLtRow2 padded">{{ $gear->reqlv }}</td>
                                <td class="bgLtRow2 padded centered"><img src="https://db.irowiki.org/image/{{ $gear->upgrade ? "yes" : "no" }}.png"></td>
                                <td class="bgLtRow1 padded centered"><img src="https://db.irowiki.org/image/{{ $gear->damage ? "yes" : "no" }}.png"></td>
                                <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($gear->binding) }}</td>
                            </tr>
                        @endif
                        @if (!is_null($gearSpecial) && count($gearSpecial) > 0)
                            <tr>
                                <td class="bgLtRow4 padded centered"></td>
                                <td class="bgLtRow1 padded" colspan="10">{!! html_entity_decode(ItemHelper::formatSpecial($gearSpecial[$gear->id]["description"])) !!}</td>
                            </tr>
                            @foreach ($gearSpecial[$gear->id]["special"] as $special)
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