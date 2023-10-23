<div class="bgSmTitle smTitle">Main</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow3 padded itemInfoTitle">Type</td>
            <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getItemTypeName($itemData->category) }}</td>
        </tr>
        <tr>
            <td class="bgLtRow4 padded itemInfoTitle">Subtype</td>
            <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getItemTypeName($itemData->category, $itemData->subcat) }}</td>
        </tr>
        <tr>
            <td class="bgLtRow3 padded itemInfoTitle">Weight</td>
            <td class="bgLtRow1 padded itemInfoText">{{ $itemData->weight !== -1 ? $itemData->weight / 10 : "??" }}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        @if ($itemData->category === 4 || $itemData->category === 5 || $itemData->category === 7)
            <tr>
                <td class="bgLtRow4 padded itemInfoTitle"><a href="http://irowiki.org/wiki/Buying_Store">Buy Shop</a></td>
                @if ($itemData->buyable === 1)
                    <td class="bgLtRow2 padded itemInfoText"><img src="https://db.irowiki.org/image/yes.png"> Yes</td>
                @else
                    <td class="bgLtRow2 padded itemInfoText"><img src="https://db.irowiki.org/image/no.png"> No</td>
                @endif
            </tr>
        @endif
        @if (!is_null($weaponData))
            @if (isset($weaponData->element))
                <tr>
                    <td class="bgLtRow4 padded itemInfoTitle">Element</td>
                    <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getElementName($weaponData->element) }}</td>
                </tr>
            @endif
            @if (isset($weaponData->level))
                <tr>
                    <td class="bgLtRow4 padded itemInfoTitle">Weapon Level</td>
                    <td class="bgLtRow2 padded itemInfoText">{{ $weaponData->level !== -1 ? $weaponData->level : "??" }}</td>
                </tr>
            @endif
        @endif
        @if (isset($itemData->reqlv))
            <tr>
                <td class="bgLtRow4 padded itemInfoTitle">Required Level</td>
                <td class="bgLtRow2 padded itemInfoText">{{ $itemData->reqlv !== -1 ? $itemData->reqlv : "??" }}</td>
            </tr>
        @endif
        @if ($itemData->category === 3)
            @if (!is_null($adjectiveData))
                <tr>
                    <td class="bgLtRow3 padded itemInfoTitle">Adjective</td>
                    <td class="bgLtRow1 padded itemInfoText">{{ $adjectiveData->adjective }}</td>
                </tr>
            @endif
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Illustration</td>
                <td class="bgLtRow1 padded itemInfoText"><a href="javascript:openCardIllust({{ $itemData->id }});">(Click to View)</a></td>
            </tr>
        @endif
        @if (isset($itemData->upgrade))
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Upgradable</td>
                <td class="bgLtRow1 padded itemInfoText">{{ $itemData->upgrade === 1 ? "Yes" : "No" }}</td>
            </tr>
        @endif
        @if (isset($itemData->damage))
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Upgradable</td>
                <td class="bgLtRow1 padded itemInfoText">{{ $itemData->upgrade === 1 ? "Yes" : "No" }}</td>
            </tr>
        @endif
        @if (isset($itemData->binding) && $itemData->binding !== 0)
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Binding</td>
                <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getBindingName($itemData->binding) }}</td>
            </tr>
        @endif
    </tbody>
</table>