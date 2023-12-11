<div class="bgSmTitle smTitle">NPC Prices</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow3 padded itemInfoTitle">Buying Price</td>
            @if (!is_null($itemShopData))
                <td class="bgLtRow1 padded itemInfoText">{{ number_format($itemData->price) }} Z {{ ItemHelper::getDiscountPrice($itemData->price) }}</td>
            @else
                <td class="bgLtRow1 padded itemInfoText">--</td>
            @endif
        </tr>
        <tr>
            <td class="bgLtRow4 padded itemInfoTitle">Selling Price</td>
            @if ($itemData->price === -1)
                <td class="bgLtRow2 padded itemInfoText">??</td>
            @else
                @if (is_numeric($itemData->price))
                    <td class="bgLtRow2 padded itemInfoText">{{ number_format(floor($itemData->price * 0.5)) }} Z {{ ItemHelper::getOverchargePrice($itemData->price * 0.5) }}</td>
                @else
                    <td class="bgLtRow2 padded itemInfoText">(Cannot be sold)</td>
                @endif
            @endif
        </tr>
    </tbody>
</table>
<div class="mdSeperator">&nbsp;</div>