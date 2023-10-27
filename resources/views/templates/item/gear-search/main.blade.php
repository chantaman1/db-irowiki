<form onsubmit="return search();">
    <table>
        <tbody>
            <tr>
                <td style="width:50%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">Main</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Name</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="text" style="width:240px;" id="name" value="{{ !is_null($inputs["name"]) ? $inputs["name"] : "" }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Effect</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="text" style="width:240px;" id="effect" value="{{ !is_null($inputs["effect"]) ? $inputs["effect"] : "" }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Type</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:190px;" id="type" name="type">
                                        <option value="">(Any)</option>
                                        @for ($ctr = 1; $ctr <= 6; $ctr++)
                                            <option @selected(!is_null($inputs["type"]) && $ctr == $inputs["type"]) value="{{ $ctr }}">{{ ItemHelper::getItemTypeName(2, $ctr) }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Job</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:190px;" id="job" name="job">
                                        <option value="">(Any)</option>
                                        <optgroup label="1st Job">
                                            @for ($ctr = 1; $ctr <= 7; $ctr++)
                                                <option @selected(!is_null($inputs["job"]) && $ctr == $inputs["job"]) value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                            @endfor
                                        </optgroup>
                                        <optgroup label="2nd Job">
                                            @for ($ctr = 8; $ctr <= 20; $ctr++)
                                                <option @selected(!is_null($inputs["job"]) && $ctr == $inputs["job"]) value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                            @endfor
                                        </optgroup>
                                        <optgroup label="Trans">
                                            @for ($ctr = 108; $ctr <= 120; $ctr++)
                                                <option @selected(!is_null($inputs["job"]) && $ctr == $inputs["job"]) value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                            @endfor
                                        </optgroup>
                                        <optgroup label="3rd Job">
                                            @for ($ctr = 208; $ctr <= 220; $ctr++)
                                                <option @selected(!is_null($inputs["job"]) && $ctr == $inputs["job"]) value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                            @endfor
                                        </optgroup>
                                        <optgroup label="Expanded">
                                            @for ($ctr = 301; $ctr <= 305; $ctr++)
                                                <option @selected(!is_null($inputs["job"]) && $ctr == $inputs["job"]) value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                            @endfor
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Upgradable</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:190px;" id="upgradable" name="upgradable">
                                        <option @selected(is_null($inputs["upgradable"])) value="">(Any)</option>
                                        <option @selected(!is_null($inputs["upgradable"]) && $inputs["upgradable"] === "1") value="1">Yes</option>
                                        <option @selected(!is_null($inputs["upgradable"]) && $inputs["upgradable"] === "0") value="0">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Breakable</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:190px;" id="breakable" name="breakable">
                                        <option @selected(is_null($inputs["breakable"])) value="">(Any)</option>
                                        <option @selected(!is_null($inputs["breakable"]) && $inputs["breakable"] === "1") value="1">Yes</option>
                                        <option @selected(!is_null($inputs["breakable"]) && $inputs["breakable"] === "0") value="0">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Enchantable</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:190px;" id="enchantable" name="enchantable">
                                        <option @selected(is_null($inputs["enchantable"])) value="">(Any)</option>
                                        <option @selected(!is_null($inputs["enchantable"]) && $inputs["enchantable"] === "1") value="1">Yes</option>
                                        <option @selected(!is_null($inputs["enchantable"]) && $inputs["enchantable"] === "0") value="0">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Binding</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:190px;" id="binding" name="binding">
                                        <option @selected(is_null($inputs["binding"])) value="">(Any)</option>
                                        <option @selected(!is_null($inputs["binding"]) && $inputs["binding"] === "0") value="0">Unbound</option>
                                        <option @selected(!is_null($inputs["binding"]) && $inputs["binding"] === "1") value="1">Account</option>
                                        <option @selected(!is_null($inputs["binding"]) && $inputs["binding"] === "2") value="2">Character</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="smSeperator"></td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Sort By</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:166px;" id="sort" name="sort">
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "1") value="1">Name</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "2") value="2">Slots</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "3") value="3">Def</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "4") value="4">MDef</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "5") value="5">Weight</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "6") value="6">Req'd Level</option>
                                        <option @selected(ItemHelper::getSortType($inputs["sort"]) === "7") value="7">Head Position</option>
                                    </select>
                                    <select style="width:70px;" id="sortDir" name="sortDir">
                                        <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "1") value="1">Asc</option>
                                        <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "2") value="2">Desc</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Detailed Results</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="checkbox" id="detailed" name="detailed" value="detailed" {{ is_null($inputs["detailed"]) ? '' : 'checked' }} />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width:50%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">Stats</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Def</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="defCon" name="defCon" onchange="adjustAttrText('def');">
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["def"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="def" name="def" value="{{ ItemHelper::getDataValue($inputs["def"], 0)  }}">
                                    <span class="extraText" id="defExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="def2" name="def2" value="{{ ItemHelper::getDataValue($inputs["def"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('def');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">MDef</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="mdefCon" name="mdefCon" onchange="adjustAttrText('mdef');">
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["mdef"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="mdef" name="mdef" value="{{ ItemHelper::getDataValue($inputs["mdef"], 0)  }}">
                                    <span class="extraText" id="mdefExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="mdef2" name="mdef2" value="{{ ItemHelper::getDataValue($inputs["mdef"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('mdef');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Slots</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="slotsCon" name="slotsCon" onchange="adjustAttrText('slots');">
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="slots" name="slots" value="{{ ItemHelper::getDataValue($inputs["slots"], 0)  }}">
                                    <span class="extraText" id="slotsExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="slots2" name="slots2" value="{{ ItemHelper::getDataValue($inputs["slots"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('slots');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Req'd Level</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="reqlvCon" name="reqlvCon" onchange="adjustAttrText('reqlv');">
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="reqlv" name="reqlv" value="{{ ItemHelper::getDataValue($inputs["reqLv"], 0)  }}">
                                    <span class="extraText" id="reqlvExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="reqlv2" name="reqlv2" value="{{ ItemHelper::getDataValue($inputs["reqLv"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('reqlv');
                                    </script>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Head Position</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow1 padded">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="headPos"><input type="checkbox" id="position1" name="position1" {{ ItemHelper::getHeadgearPosition($inputs["position"], 1) ? 'checked' : '' }} />Upper</td>
                                                <td class="headPos"><input type="checkbox" id="position2" name="position2" {{ ItemHelper::getHeadgearPosition($inputs["position"], 2) ? 'checked' : '' }} />Middle</td>
                                                <td class="headPos"><input type="checkbox" id="position3" name="position3" {{ ItemHelper::getHeadgearPosition($inputs["position"], 3) ? 'checked' : '' }}/ >Lower</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="bgDkTable">
        <tbody>
            <tr>
                <td class="bgDkRow5 thickPadded">
                    <input type="submit" value="Search">
                </td>
            </tr>
        </tbody>
    </table>
</form>