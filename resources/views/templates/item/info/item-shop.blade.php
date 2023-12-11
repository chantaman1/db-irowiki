@if (!is_null($itemShopData))
    <div class="bgSmTitle smTitle">Purchasable At</div>
    <table class="bgLtTable">
        <tbody>
            @foreach ($itemShopData as $shop)
                @php
                    $color = MiscHelper::toggleColor();
                @endphp
                <tr>
                    <td class="bgLtRow{{ $color }} padded">
                        <a href="/db/shop-info/{{ $shop->id }}/">{{ $shop->mapName }} {{ $shop->shopName }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mdSeperator">&nbsp;</div>
@endif