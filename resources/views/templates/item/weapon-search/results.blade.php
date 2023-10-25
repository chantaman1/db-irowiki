@if (!is_null($data) && count($data) > 0)
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Results</div>
    <table class="bgDkRow3">
        <tr>
            <td>&nbsp;
                @if (count($data) === 0)
                    No items found
                @elseif (count($data) === 1)
                    1 item found
                @else
                    {{ count($data) }} items found
                @endif
            </td>
        </tr>
    </table>
    <table class="bgLtTable">
        <table class="bgLtTable">
            <tbody>
                <tr>
                    <td class="bgHeader3 padded nowrap" style="width:2%;">&nbsp;</td>
                    <td class="bgHeader1 padded nowrap" style="width:28%;">Name</td>
                    <td class="bgHeader2 padded nowrap" style="width:7.5%;">Atk</td>
                    <td class="bgHeader1 padded nowrap" style="width:7.5%;">MAtk</td>
                    <td class="bgHeader2 padded nowrap" style="width:7%;">Weight</td>
                    <td class="bgHeader1 padded nowrap" style="width:7%;">Wep Lv</td>
                    <td class="bgHeader2 padded nowrap" style="width:7%;">Req'd Lv</td>
                    <td class="bgHeader1 padded nowrap" style="width:10%;">Element</td>
                    <td class="bgHeader2 padded nowrap" style="width:7%;">Upgrade</td>
                    <td class="bgHeader1 padded nowrap" style="width:7%;">Break</td>
                    <td class="bgHeader2 padded nowrap" style="width:10%;">Binding</td>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td class="bgLtRow3 padded centered"><img src="https://db.irowiki.org/image/item/{{ $item->id }}.png"></td>
                        <td class="bgLtRow1 padded"><a href="/db/item-info/{{ $item->id }}/">{{ $item->name }}</a></td>
                        <td class="bgLtRow2 padded">{{ $item->atk }}</td>
                        <td class="bgLtRow1 padded">{{ $item->matk2 }}</td>
                        <td class="bgLtRow2 padded">{{ $item->weight / 10 }}</td>
                        <td class="bgLtRow1 padded">{{ $item->level }}</td>
                        <td class="bgLtRow2 padded">{{ $item->reqlv }}</td>
                        <td class="bgLtRow1 padded">{{ ItemHelper::getElementName($item->element) }}</td>
                        <td class="bgLtRow2 padded centered">{{ $item->upgrade }}</td>
                        <td class="bgLtRow1 padded centered">{{ $item->damage }}</td>
                        <td class="bgLtRow2 padded">{{ ItemHelper::getBindingName($item->binding) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="bgLtRow3 padded centered"></td>
                    <td class="bgLtRow1 padded" colspan="10">A staff containing a wind fairy that grants its user the essense of speed.</td>
                </tr>
            </tbody>
        </table>
    </table>
@endif