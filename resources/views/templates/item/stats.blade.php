@if ($itemData->category === 1 || (!is_null($gearData) && ($gearData->def2 > 0 || $gearData->mdef2 > 0)) || !is_null($itemHealData) || !is_null($itemSpecialStatsData))
    <div class="bgSmTitle smTitle">Stats</div>
    <table class="bgLtTable">
        <tbody>
            @if ($itemData->category === 1)
                <tr>
                    <td class="bgLtRow3 padded itemInfoTitle">Atk</td>
                    <td class="bgLtRow1 padded itemInfoText">{{ $weaponData->atk !== -1 ? $weaponData->atk : "??" }}</td>
                </tr>
                @if (isset($weaponData->matk2) && $weaponData->matk2 !== 0)
                    <tr>
                        <td class="bgLtRow3 padded itemInfoTitle">MAtk</td>
                        <td class="bgLtRow1 padded itemInfoText">{{ $weaponData->matk2 !== -1 ? $weaponData->matk2 : "??" }}</td>
                    </tr>
                @endif
            @elseif (!is_null($gearData) && $itemData->category === 2)
                <tr>
                    <td class="bgLtRow3 padded itemInfoTitle">Def</td>
                    <td class="bgLtRow1 padded itemInfoText">{{ $gearData->def2 !== -1 ? $gearData->def2 : "??" }}</td>
                </tr>
                <tr>
                    <td class="bgLtRow3 padded itemInfoTitle">MDef</td>
                    <td class="bgLtRow1 padded itemInfoText">{{ $gearData->mdef2 !== -1 ? $gearData->mdef2 : "??" }}</td>
                </tr>
            @elseif (!is_null($itemHealData) && $itemData->category === 4 && $itemData->subcat === 2)
                @if ($itemHealData->hpMin)
                    <tr>
                        <td class="bgLtRow3 padded itemInfoTitle">HP Heal</td>
                        @if ($itemHealData->hpMin !== $itemHealData->hpMax)
                            <td class="bgLtRow1 padded itemInfoText">{{ $itemHealData->hpMin }} ~ {{ $itemHealData->hpMax }}</td>
                        @else
                            <td class="bgLtRow1 padded itemInfoText">{{ $itemHealData->hpMin }}</td>
                        @endif
                    </tr>
                @endif
                @if ($itemHealData->spMin)
                    <tr>
                        <td class="bgLtRow3 padded itemInfoTitle">SP Heal</td>
                        @if ($itemHealData->spMin !== $itemHealData->spMax)
                            <td class="bgLtRow1 padded itemInfoText">{{ $itemHealData->spMin }} ~ {{ $itemHealData->spMax }}</td>
                        @else
                            <td class="bgLtRow1 padded itemInfoText">{{ $itemHealData->spMin }}</td>
                        @endif
                    </tr>
                @endif
            @endif
            @if (!is_null($itemSpecialStatsData))
                @foreach ($itemSpecialStatsData as $stats)
                    <tr>
                        <td class="bgLtRow3 padded itemInfoTitle">{{ ItemHelper::getItemStat($stats->special, true) }}</td>
                        <td class="bgLtRow1 padded itemInfoText">{{ ItemHelper::getItemStat($stats->special) }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mdSeperator">&nbsp;</div>
@endif