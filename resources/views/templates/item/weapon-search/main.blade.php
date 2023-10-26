<form onsubmit="return search();">
    <table>
        <tr>
            <td style="width:50%; vertical-align:top;">
                <div class="bgSmTitle smTitle">Main</div>
                <table class="bgLtTable">
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Name</td>
                        <td class="bgLtRow1 padded optArea">
                            <input type="text" style="width:240px;" id="name" name="name" value="{{ !is_null($inputs["name"]) ? $inputs["name"] : "" }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Effect</td>
                        <td class="bgLtRow2 padded optArea">
                            <input type="text" style="width:240px;" id="effect" name="effect" value="{{ !is_null($inputs["effect"]) ? $inputs["effect"] : "" }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Type</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="type" name="type">
                                <option value="">(Any)</option>
                                @for ($ctr = 1; $ctr <= 22; $ctr++)
                                    <option @selected(!is_null($inputs["type"]) && $ctr == $inputs["type"]) value="{{ $ctr }}">{{ ItemHelper::getItemTypeName(1, $ctr) }}</option>
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
                        <td class="bgLtRow3 padded optCaption">Binding</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="binding" name="binding">
                                <option @selected(is_null($inputs["binding"])) value="">(Any)</option>
                                <option @selected(!is_null($inputs["binding"]) && $inputs["binding"] === "1") value="1">Account</option>
                                <option @selected(!is_null($inputs["binding"]) && $inputs["binding"] === "2") value="2">Character</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="smSeperator"></td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Sort By</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:166px;" id="sort" name="sort">
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "1") value="1">Name</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "2") value="2">Slots</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "3") value="3">Attack</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "4") value="4">M. Attack</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "5") value="5">Weight</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "6") value="6">Weapon Level</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "7") value="7">Required Level</option>
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "8") value="8">Element</option>
                            </select>
                            <select style="width:70px;" id="sortDir" name="sortDir" >
                                <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "1") value="1">Asc</option>
                                <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "2") value="2">Desc</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Detailed Results</td>
                        <td class="bgLtRow2 padded optArea">
                            <input type="checkbox" id="detailed" value="detailed" name="detailed" {{ is_null($inputs["detailed"]) ? '' : 'checked' }} />
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:50%; vertical-align:top;">
                <div class="bgSmTitle smTitle">Stats</div>
                <table class="bgLtTable">
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Attack</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:80px;" id="atkCon" name="atkCon" onChange="adjustAttrText('atk');">
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "1") value="1">=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "2") value="2">&gt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "3") value="3">&lt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "4") value="4">&gt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "5") value="5">&lt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["atk"]) === "6") value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="atk" name="atk" value="{{ ItemHelper::getDataValue($inputs["atk"], 0)  }}" />
                            <span class="extraText" id="atkExtra">
                                and <input type="text" style="width:100px;" id="atk2" name="atk2" value="{{ ItemHelper::getDataValue($inputs["atk"], 1)  }}" />
                            </span>
                            <script type="text/javascript">
                                adjustAttrText('atk');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">M. Attack</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:80px;" id="matkCon" name="matkCon" onChange="adjustAttrText('matk');">
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "1") value="1">=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "2") value="2">&gt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "3") value="3">&lt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "4") value="4">&gt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "5") value="5">&lt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["matk"]) === "6") value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="matk" name="matk" value="{{ ItemHelper::getDataValue($inputs["matk"], 0)  }}" />
                            <span class="extraText" id="matkExtra">
                                and <input type="text" style="width:100px;" id="matk2" name="matk2" value="{{ ItemHelper::getDataValue($inputs["matk"], 1)  }}" />
                            </span>
                            <script type="text/javascript">
                                adjustAttrText('matk');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Slots</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:80px;" id="slotsCon" name="slotsCon" onChange="adjustAttrText('slots');">
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "1") value="1">=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "2") value="2">&gt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "3") value="3">&lt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "4") value="4">&gt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "5") value="5">&lt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["slots"]) === "6") value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="slots" name="slots" value="{{ ItemHelper::getDataValue($inputs["slots"], 0)  }}" />
                            <span class="extraText" id="slotsExtra">
                                and <input type="text" style="width:100px;" id="slots2" name="slots2" value="{{ ItemHelper::getDataValue($inputs["slots"], 1)  }}" />
                            </span>
                            <script type="text/javascript">
                                adjustAttrText('slots');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Weapon Level</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:80px;" id="weplvCon" name="weplvCon" onChange="adjustAttrText('weplv');">
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "1") value="1">=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "2") value="2">&gt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "3") value="3">&lt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "4") value="4">&gt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "5") value="5">&lt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["wepLv"]) === "6") value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="weplv" name="weplv" value="{{ ItemHelper::getDataValue($inputs["wepLv"], 0)  }}" />
                            <span class="extraText" id="weplvExtra">
                                and <input type="text" style="width:100px;" id="weplv2" name="weplv2" value="{{ ItemHelper::getDataValue($inputs["wepLv"], 1)  }}" />
                            </span>
                            <script type="text/javascript">
                                adjustAttrText('weplv');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Required Level</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:80px;" id="reqlvCon" name="reqlvCon" onChange="adjustAttrText('reqlv');">
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "1") value="1">=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "2") value="2">&gt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "3") value="3">&lt;</option>
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "4") value="4">&gt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "5") value="5">&lt;=</option>
                                <option @selected(ItemHelper::getOperationType($inputs["reqLv"]) === "6") value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="reqlv" name="reqlv" value="{{ ItemHelper::getDataValue($inputs["reqLv"], 0)  }}" />
                            <span class="extraText" id="reqlvExtra">
                                and <input type="text" style="width:100px;" id="reqlv2" name="reqlv2" value="{{ ItemHelper::getDataValue($inputs["reqLv"], 1)  }}" />
                            </span>
                            <script type="text/javascript">
                                adjustAttrText('reqlv');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Element</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="element" name="element">
                                <option @selected(is_null($inputs["element"])) value="">(Any)</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "1") value="1">Neutral</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "2") value="2">Fire</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "3") value="3">Earth</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "4") value="4">Wind</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "5") value="5">Water</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "6") value="6">Poison</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "7") value="7">Holy</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "8") value="8">Shadow</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "9") value="9">Ghost</option>
                                <option @selected(!is_null($inputs["element"]) && $inputs["element"] === "10") value="10">Undead</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="bgDkTable">
        <tr>
            <td class="bgDkRow5 thickPadded">
                <input type="submit" value="Search" />
            </td>
        </tr>
    </table>
</form>