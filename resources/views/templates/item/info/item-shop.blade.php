@if (!is_null($itemShopData))
    <div class="bgSmTitle smTitle">Purchasable At</div>
    <table class="bgLtTable">
        <tbody>
            @foreach ($itemShopData as $shop)
                <tr>
                    <td class="bgLtRow2 padded">
                        <a href="/db/shop-info/{{ $shop->id }}/">{{ $shop->mapName }} {{ $shop->shopName }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mdSeperator">&nbsp;</div>
@endif