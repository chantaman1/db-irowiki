<td style="width:50%; vertical-align:top;">
    <table class="bgSmTitle">
        <tr>
            <td class="smTitle">&nbsp;Items</td>
        </tr>
    </table>
    <table class="bgLtTable">
        <tr>
            <td class="bgHeader3 padded" style="width:2%;">&nbsp;</td>
            <td class="bgHeader1 padded" style="width:58%;">Item</td>
            <td class="bgHeader2 padded" style="width:20%;">Price</td>
            <td class="bgHeader1 padded" style="width:20%;">DC'd Price</td>
        </tr>
        @foreach ($shopItems as $shopItem)
            @php
                $color = MiscHelper::toggleColor();
            @endphp
            <tr>
                <td class="bgLtRow{{ $color + 2 }} padded">
                    <img src="https://db.irowiki.org/image/item/{{ $shopItem['item']->item }}.png">
                </td>
                <td class="bgLtRow{{ $color }} padded">
                    <a href="/db/item-info/{{ $shopItem['item']->item }}">{{ $shopItem['item']->name }}</a>
                </td>
                <td class="bgLtRow{{ $color + 1 }} padded">{{ number_format($shopItem['price']) }} Z</td>
                <td class="bgLtRow{{ $color }} padded">{{ str_replace(['(', ')'], "", ItemHelper::getDiscountPrice($shopItem['price'])) }}</td>
            </tr>
        @endforeach
    </table>
</td>