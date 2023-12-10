
@if(!is_null($boxDrops))
    <div class="bgSmTitle smTitle">{{ $boxName }}</div>
    <table class="bgLtTable">
        <tr>
            <td class="bgHeader3 padded" style="width:2%;">&nbsp;</td>
            <td class="bgHeader1 padded" style="width:78%;">Item</td>
            <td class="bgHeader2 padded" style="width:20%;">Rate</td>
        </tr>
        @foreach($boxDrops as $item)
            @php
                $color = MapHelper::toggleColor();
            @endphp
            <tr>
                <td class="bgLtRow{{ $color + 2 }} padded">
                    <img src="https://db.irowiki.org/image/item/{{ $item->id }}.png" />
                </td>
                <td class="bgLtRow{{ $color }} padded">
                    <a href="/db/item-info/{{ $item->id }}/">{{ $item->name }}</a>
                </td>
                <td class="bgLtRow{{ $color + 1 }} padded">{{ ItemHelper::getDropRate($item->rate, true) }}</td>
            </tr>
        @endforeach
    </table>
@endif