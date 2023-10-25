<form onsubmit="return search();">
    <table>
        <tr>
            <td style="width:50%; vertical-align:top;">
                <div class="bgSmTitle smTitle">Main</div>
                <table class="bgLtTable">
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Name</td>
                        <td class="bgLtRow1 padded optArea">
                            <input type="text" style="width:240px;" id="name" name="name" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Effect</td>
                        <td class="bgLtRow2 padded optArea">
                            <input type="text" style="width:240px;" id="effect" name="effect" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Type</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="type" name="type">
                                <option value="">(Any)</option>
                                @for ($ctr = 1; $ctr <= 22; $ctr++)
                                    <option value="{{ $ctr }}">{{ ItemHelper::getItemTypeName(1, $ctr) }}</option>
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
                                        <option value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                    @endfor
                                </optgroup>
                                <optgroup label="2nd Job">
                                    @for ($ctr = 8; $ctr <= 20; $ctr++)
                                        <option value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                    @endfor
                                </optgroup>
                                <optgroup label="Trans">
                                    @for ($ctr = 108; $ctr <= 120; $ctr++)
                                        <option value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                    @endfor
                                </optgroup>
                                <optgroup label="3rd Job">
                                    @for ($ctr = 208; $ctr <= 220; $ctr++)
                                        <option value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                    @endfor
                                </optgroup>
                                <optgroup label="Expanded">
                                    @for ($ctr = 301; $ctr <= 305; $ctr++)
                                        <option value="{{ $ctr }}">{{ ItemHelper::getJobName($ctr) }}</option>
                                    @endfor
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Upgradable</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="upgradable" name="upgradable">
                                <option value="">(Any)</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Breakable</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:190px;" id="breakable" name="breakable">
                                <option value="">(Any)</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow3 padded optCaption">Binding</td>
                        <td class="bgLtRow1 padded optArea">
                            <select style="width:190px;" id="binding" name="binding">
                                <option value="">(Any)</option>
                                <option value="1">Account</option>
                                <option value="2">Character</option>
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
                                <option value="1">Name</option>
                                <option value="2">Slots</option>
                                <option value="3">Attack</option>
                                <option value="4">M. Attack</option>
                                <option value="5">Weight</option>
                                <option value="6">Weapon Level</option>
                                <option value="7">Required Level</option>
                                <option value="8">Element</option>
                            </select>
                            <select style="width:70px;" id="sortDir" name="sortDir" >
                                <option value="1">Asc</option>
                                <option value="2">Desc</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Detailed Results</td>
                        <td class="bgLtRow2 padded optArea">
                            <input type="checkbox" id="detailed" value="detailed" name="detailed" />
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
                                <option value="1">=</option>
                                <option value="2">&gt;</option>
                                <option value="3">&lt;</option>
                                <option value="4">&gt;=</option>
                                <option value="5">&lt;=</option>
                                <option value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="atk" name="atk" value="" />
                            <span class="extraText" id="atkExtra">
                                and <input type="text" style="width:100px;" id="atk2" name="atk2" value="" />
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
                                <option value="1">=</option>
                                <option value="2">&gt;</option>
                                <option value="3">&lt;</option>
                                <option value="4">&gt;=</option>
                                <option value="5">&lt;=</option>
                                <option value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="matk" name="matk" value="" />
                            <span class="extraText" id="matkExtra">
                                and <input type="text" style="width:100px;" id="matk2" name="matk2" value="" />
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
                                <option value="1">=</option>
                                <option value="2">&gt;</option>
                                <option value="3">&lt;</option>
                                <option value="4">&gt;=</option>
                                <option value="5">&lt;=</option>
                                <option value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="slots" name="slots" value="" />
                            <span class="extraText" id="slotsExtra">
                                and <input type="text" style="width:100px;" id="slots2" name="slots2" value="" />
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
                                <option value="1">=</option>
                                <option value="2">&gt;</option>
                                <option value="3">&lt;</option>
                                <option value="4">&gt;=</option>
                                <option value="5">&lt;=</option>
                                <option value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="weplv" name="weplv" value="" />
                            <span class="extraText" id="weplvExtra">
                                and <input type="text" style="width:100px;" id="weplv2" name="weplv2" value="" />
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
                                <option value="1">=</option>
                                <option value="2">&gt;</option>
                                <option value="3">&lt;</option>
                                <option value="4">&gt;=</option>
                                <option value="5">&lt;=</option>
                                <option value="6">Between</option>
                            </select>
                            <input type="text" style="width:100px;" id="reqlv" name="reqlv" value="" />
                            <span class="extraText" id="reqlvExtra">
                                and <input type="text" style="width:100px;" id="reqlv2" name="reqlv2" value="" />
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
                                <option value="">(Any)</option>
                                <option value="1">Neutral</option>
                                <option value="2">Fire</option>
                                <option value="3">Earth</option>
                                <option value="4">Wind</option>
                                <option value="5">Water</option>
                                <option value="6">Poison</option>
                                <option value="7">Holy</option>
                                <option value="8">Shadow</option>
                                <option value="9">Ghost</option>
                                <option value="10">Undead</option>
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