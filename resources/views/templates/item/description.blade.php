@if($itemData->description !== "NULL" || !is_null($itemSpecialMainData) || !is_null($itemSpecialGroupMain) || !is_null($itemSetData) || !is_null($itemData->notes))
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    @if ($itemData->description !== "NULL" && $itemData->category !== 3)
                        {!! html_entity_decode(str_replace("\n", "<br>", ItemHelper::formatSpecial($itemData->description))) !!}
                    @endif
                    @if (!is_null($itemSpecialMainData) || !is_null($itemSpecialGroupMain))
                        @if ($itemData->description !== "NULL" && $itemData->category !== 3)
                            <hr>
                        @endif
                        <ul>
                            @if (!is_null($itemSpecialMainData))
                                @foreach ($itemSpecialMainData as $specialMain)
                                    <li>{!! html_entity_decode(ItemHelper::formatSpecial($specialMain->special)) !!}</li>
                                @endforeach
                            @endif
                            @if (!is_null($itemSpecialGroupMain))
                                @foreach ($itemSpecialGroupMain as $specialGroupMain)
                                    <li>{!! html_entity_decode(ItemHelper::formatSpecial($specialGroupMain->special)) !!}:</li>
                                    <ul>
                                        @foreach ($itemSpecialGroupList[$specialGroupMain->grp] as $specialGroupList)
                                            <li>{!! html_entity_decode(ItemHelper::formatSpecial($specialGroupList->special)) !!}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            @endif
                        </ul>
                    @endif
                    @if (!is_null($itemSetData))
                        @if (($itemData->description !== "NULL" && $itemData->category !== 3) || !is_null($itemSpecialMainData))
                            <hr>
                        @endif
                        <ul>
                            @foreach ($itemSetData as $itemSet)
                                @if (!is_null($itemSet["itemSetInfo"]))
                                    <li>Set bonus with {!! html_entity_decode(ItemHelper::getItemsUrl($itemSet["itemSetInfo"], $itemSet["setType"])) !!}:</li>
                                @else
                                    <li>Set bonus with (Unknown):</li>
                                @endif
                                <ul>
                                    @if (!is_null($itemSet["itemSetSpecial"]))
                                        @foreach ($itemSet["itemSetSpecial"] as $setSpecial)
                                            <li>{!! html_entity_decode(ItemHelper::formatSpecial($setSpecial->special)) !!}</li>
                                        @endforeach
                                    @endif
                                    @if (!is_null($itemSet["itemSetGroupMain"]))
                                        @foreach ($itemSet["itemSetGroupMain"] as $setGroupMain)
                                            <li>{!! html_entity_decode(ItemHelper::formatSpecial($setGroupMain->special)) !!}:</li>
                                            <ul>
                                                @foreach ($itemSet["itemSetGroupList"][$setGroupMain->grp] as $setGroupList)
                                                    <li>{!! html_entity_decode(ItemHelper::formatSpecial($setGroupList->special)) !!}</li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    @endif
                                </ul>
                            @endforeach
                        </ul>
                    @endif
                    @if (!is_null($itemData->notes) && $itemData->notes !== "")
                        <div style="padding-left:10px; padding-top:4px;">
                            <div style="color:rgba(30,30,110,1)">Special Notes:</div>
                            <ul>
                                @foreach (explode("\n", ItemHelper::formatSpecial($itemData->notes)) as $note)
                                    <li>{!! html_entity_decode($note) !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endif