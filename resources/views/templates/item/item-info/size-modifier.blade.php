@if ($itemData->category === 1 && $itemData->subcat <= 22)
    <div class="bgSmTitle smTitle">Size Modifiers</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Small</td>
                <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($itemData->subcat, 1) }}%</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded itemInfoTitle">Medium</td>
                <td class="bgLtRow2 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($itemData->subcat, 2) }}%</td>
            </tr>
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Large</td>
                <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getWeaponSizeMod($itemData->subcat, 3) }}%</td>
            </tr>
        </tbody>
    </table>
    <div class="mdSeperator">&nbsp;</div>
@endif