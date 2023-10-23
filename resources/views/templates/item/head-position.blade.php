@if (!is_null($gearData) && ($itemData->category === 2 || $itemData->category === 8) && $itemData->subcat === 1)
    <div class="bgSmTitle smTitle">Head Position</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Top</td>
                <td class="bgLtRow1 padded itemInfoText">{{ ($gearData->position & 1) === 1 ? "X" : "" }}</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded itemInfoTitle">Middle</td>
                <td class="bgLtRow2 padded itemInfoText">{{ ($gearData->position & 2) === 2 ? "X" : "" }}</td>
            </tr>
            <tr>
                <td class="bgLtRow3 padded itemInfoTitle">Bottom</td>
                <td class="bgLtRow1 padded itemInfoText">{{ ($gearData->position & 4) === 4 ? "X" : "" }}</td>
            </tr>
        </tbody>
    </table>
@endif