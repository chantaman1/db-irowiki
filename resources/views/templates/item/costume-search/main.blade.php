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
                                        @for ($ctr = 1; $ctr <= 8; $ctr++)
                                            <option @selected(!is_null($inputs["type"]) && $ctr == $inputs["type"]) value="{{ $ctr }}">{{ ItemHelper::getItemTypeName(11, $ctr) }}</option>
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
                                        <option @selected(MiscHelper::getSortType($inputs["sort"]) === "1") value="1">Name</option>
                                        <option @selected(MiscHelper::getSortType($inputs["sort"]) === "5") value="5">Weight</option>
                                        <option @selected(MiscHelper::getSortType($inputs["sort"]) === "6") value="6">Req'd Level</option>
                                        <option @selected(MiscHelper::getSortType($inputs["sort"]) === "7") value="7">Head Position</option>
                                    </select>
                                    <select style="width:70px;" id="sortDir" name="sortDir">
                                        <option @selected(MiscHelper::getSortDir($inputs["sort"]) === "1") value="1">Asc</option>
                                        <option @selected(MiscHelper::getSortDir($inputs["sort"]) === "2") value="2">Desc</option>
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
                                <td class="bgLtRow4 padded optCaption">Req'd Level</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="reqlvCon" name="reqlvCon" onchange="adjustAttrText('reqlv');">
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["reqLv"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="reqlv" name="reqlv" value="{{ MiscHelper::getDataValue($inputs["reqLv"], 0)  }}">
                                    <span class="extraText" id="reqlvExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="reqlv2" name="reqlv2" value="{{ MiscHelper::getDataValue($inputs["reqLv"], 1)  }}">
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