<form onsubmit="return process();">
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
                                    <input type="text" style="width:240px;" id="name" name="name" value="{{ !is_null($inputs["name"]) ? $inputs["name"] : "" }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Map ID</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="text" style="width:240px;" id="map" name="map" value="{{ !is_null($inputs["map"]) ? $inputs["map"] : "" }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Skill Use</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="text" style="width:240px;" id="skill" name="skill" value="{{ !is_null($inputs["skill"]) ? $inputs["skill"] : "" }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="smSeperator"></td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Looter</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="radio" name="looter" {{ is_null($inputs["looter"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="looter1" name="looter" {{ !is_null($inputs["looter"]) && $inputs["looter"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="looter2" name="looter" {{ !is_null($inputs["looter"]) && $inputs["looter"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Assist</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="radio" name="assist" {{ is_null($inputs["assist"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="assist1" name="assist" {{ !is_null($inputs["assist"]) && $inputs["assist"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="assist2" name="assist" {{ !is_null($inputs["assist"]) && $inputs["assist"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Aggressive</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="radio" name="aggro" {{ is_null($inputs["aggro"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="aggro1" name="aggro" {{ !is_null($inputs["aggro"]) && $inputs["aggro"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="aggro2" name="aggro" {{ !is_null($inputs["aggro"]) && $inputs["aggro"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Hyper-active</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="radio" name="hyper" {{ is_null($inputs["hyper"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="hyper1" name="hyper" {{ !is_null($inputs["hyper"]) && $inputs["hyper"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="hyper2" name="hyper" {{ !is_null($inputs["hyper"]) && $inputs["hyper"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Changes Target</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="radio" name="ctarget" {{ is_null($inputs["ctarget"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="ctarget1" name="ctarget" {{ !is_null($inputs["ctarget"]) && $inputs["ctarget"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="ctarget2" name="ctarget" {{ !is_null($inputs["ctarget"]) && $inputs["ctarget"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Cast Sensor</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="radio" name="csensor" {{ is_null($inputs["csensor"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="csensor1" name="csensor" {{ !is_null($inputs["csensor"]) && $inputs["csensor"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="csensor2" name="csensor" {{ !is_null($inputs["csensor"]) && $inputs["csensor"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Mobile</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="radio" name="mobile" {{ is_null($inputs["mobile"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="mobile1" name="mobile" {{ !is_null($inputs["mobile"]) && $inputs["mobile"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="mobile2" name="mobile" {{ !is_null($inputs["mobile"]) && $inputs["mobile"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Plant</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="radio" name="plant" {{ is_null($inputs["plant"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="plant1" name="plant" {{ !is_null($inputs["plant"]) && $inputs["plant"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="plant2" name="plant" {{ !is_null($inputs["plant"]) && $inputs["plant"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Boss</td>
                                <td class="bgLtRow1 padded optArea">
                                    <input type="radio" name="boss" {{ is_null($inputs["boss"]) ? "checked" : "" }}>Any
                                    <input type="radio" id="boss1" name="boss" {{ !is_null($inputs["boss"]) && $inputs["boss"] === "1" ? "checked" : "" }}>Yes
                                    <input type="radio" id="boss2" name="boss" {{ !is_null($inputs["boss"]) && $inputs["boss"] === "0" ? "checked" : "" }}>No
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Type</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow1 padded">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="category1" {{ is_null($inputs["category"]) || (!is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 1)) ? "checked" : "" }}>Normal</td>
                                                <td class="checkGrp"><input type="checkbox" id="category3" {{ !is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 3) ? "checked" : "" }}>Special</td>
                                                <td class="checkGrp"><input type="checkbox" id="category5" {{ !is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 5) ? "checked" : "" }}>Plant</td>
                                            </tr>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="category2" {{ is_null($inputs["category"]) || (!is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 2)) ? "checked" : "" }}>MVP</td>
                                                <td class="checkGrp"><input type="checkbox" id="category4" {{ !is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 4) ? "checked" : "" }}>Quest</td>
                                                <td class="checkGrp"><input type="checkbox" id="category6" {{ !is_null($inputs["category"]) && MonsterHelper::isCategoryInType($inputs["category"], 6) ? "checked" : "" }}>WoE</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Options</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Listing Type</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:240px;" id="listType">
                                        <option value="1" @selected(is_null($inputs["ltype"]) || (!is_null($inputs["ltype"]) && $inputs["ltype"] === "1"))>Standard</option>
                                        <option value="2" @selected(!is_null($inputs["ltype"]) && $inputs["ltype"] === "2")>Exp to HP Ratio</option>
                                        <option value="3" @selected(!is_null($inputs["ltype"]) && $inputs["ltype"] === "3")>95% Flee &amp; 100% Hit</option>
                                        <option value="4" @selected(!is_null($inputs["ltype"]) && $inputs["ltype"] === "4")>Stats</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Sort By</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:166px;" id="sort">
                                        <option value="1" @selected(MiscHelper::getSortType($inputs["sort"]) === "1")>Level</option>
                                        <option value="2" @selected(MiscHelper::getSortType($inputs["sort"]) === "2")>Name</option>
                                        <option value="3" @selected(MiscHelper::getSortType($inputs["sort"]) === "3")>Size</option>
                                        <option value="4" @selected(MiscHelper::getSortType($inputs["sort"]) === "4")>Race</option>
                                        <option value="5" @selected(MiscHelper::getSortType($inputs["sort"]) === "5")>Element</option>
                                        <option value="6" @selected(MiscHelper::getSortType($inputs["sort"]) === "6")>HP</option>
                                        <option value="7" @selected(MiscHelper::getSortType($inputs["sort"]) === "7")>Attack</option>
                                        <option value="8" @selected(MiscHelper::getSortType($inputs["sort"]) === "8")>Def</option>
                                        <option value="9" @selected(MiscHelper::getSortType($inputs["sort"]) === "9")>MDef</option>
                                        <option value="10" @selected(MiscHelper::getSortType($inputs["sort"]) === "10")>Base Exp</option>
                                        <option value="11" @selected(MiscHelper::getSortType($inputs["sort"]) === "11")>Job Exp</option>
                                        <option value="12" @selected(MiscHelper::getSortType($inputs["sort"]) === "12")>95% Flee</option>
                                        <option value="13" @selected(MiscHelper::getSortType($inputs["sort"]) === "13")>100% Hit</option>
                                        <option value="14" @selected(MiscHelper::getSortType($inputs["sort"]) === "14")>Agi</option>
                                        <option value="15" @selected(MiscHelper::getSortType($inputs["sort"]) === "15")>Vit</option>
                                        <option value="16" @selected(MiscHelper::getSortType($inputs["sort"]) === "16")>Int</option>
                                        <option value="17" @selected(MiscHelper::getSortType($inputs["sort"]) === "17")>Dex</option>
                                        <option value="18" @selected(MiscHelper::getSortType($inputs["sort"]) === "18")>Luk</option>
                                    </select>
                                    <select style="width:70px;" id="sortDir">
                                        <option value="1" @selected(MiscHelper::getSortDir($inputs["sort"]) === "1")>Asc</option>
                                        <option value="2" @selected(MiscHelper::getSortDir($inputs["sort"]) === "2")>Desc</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Header</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:240px;" id="header">
                                        <option value="5" @selected(!is_null($inputs["header"]) && $inputs["header"] === "5")>Every 5 rows</option>
                                        <option value="10" @selected(is_null($inputs["header"]) || (!is_null($inputs["header"]) && $inputs["header"] === "10"))>Every 10 rows</option>
                                        <option value="20" @selected(!is_null($inputs["header"]) && $inputs["header"] === "20")>Every 20 rows</option>
                                        <option value="50" @selected(!is_null($inputs["header"]) && $inputs["header"] === "50")>Every 50 rows</option>
                                    </select>
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
                                <td class="bgLtRow4 padded optCaption">HP</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="hpCon" onchange="adjustAttrText('hp');">
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hp"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="hp" value="{{ MiscHelper::getDataValue($inputs["hp"], 0)  }}">
                                    <span class="extraText" id="hpExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="hp2" value="{{ MiscHelper::getDataValue($inputs["hp"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('hp');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Level</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="levelCon" onchange="adjustAttrText('level');">
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["level"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="level" value="{{ MiscHelper::getDataValue($inputs["level"], 0)  }}">
                                    <span class="extraText" id="levelExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="level2" value="{{ MiscHelper::getDataValue($inputs["level"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('level');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Attack</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="attackCon" onchange="adjustAttrText('attack');">
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["attack"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="attack" value="{{ MiscHelper::getDataValue($inputs["attack"], 0)  }}">
                                    <span class="extraText" id="attackExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="attack2" value="{{ MiscHelper::getDataValue($inputs["attack"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('attack');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Def</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="defCon" onchange="adjustAttrText('def');">
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["def"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="def" value="{{ MiscHelper::getDataValue($inputs["def"], 0)  }}">
                                    <span class="extraText" id="defExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="def2" value="{{ MiscHelper::getDataValue($inputs["def"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('def');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">MDef</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="mdefCon" onchange="adjustAttrText('mdef');">
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["mdef"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="mdef" value="{{ MiscHelper::getDataValue($inputs["mdef"], 0)  }}">
                                    <span class="extraText" id="mdefExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="mdef2" value="{{ MiscHelper::getDataValue($inputs["mdef"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('mdef');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Base Exp</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="bexpCon" onchange="adjustAttrText('bexp');">
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["bexp"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="bexp" value="{{ MiscHelper::getDataValue($inputs["bexp"], 0)  }}">
                                    <span class="extraText" id="bexpExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="bexp2" value="{{ MiscHelper::getDataValue($inputs["bexp"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('bexp');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Job Exp</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="jexpCon" onchange="adjustAttrText('jexp');">
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["jexp"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="jexp" value="{{ MiscHelper::getDataValue($inputs["jexp"], 0)  }}">
                                    <span class="extraText" id="jexpExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="jexp2" value="{{ MiscHelper::getDataValue($inputs["jexp"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('jexp');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">95% Flee</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="fleeCon" onchange="adjustAttrText('flee');">
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["flee"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="flee" value="{{ MiscHelper::getDataValue($inputs["flee"], 0)  }}">
                                    <span class="extraText" id="fleeExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="flee2" value="{{ MiscHelper::getDataValue($inputs["flee"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('flee');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">100% Hit</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="hitCon" onchange="adjustAttrText('hit');">
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["hit"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="hit" value="{{ MiscHelper::getDataValue($inputs["hit"], 0)  }}">
                                    <span class="extraText" id="hitExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="hit2" value="{{ MiscHelper::getDataValue($inputs["hit"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('hit');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Agi</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="agiCon" onchange="adjustAttrText('agi');">
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["agi"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="agi" value="{{ MiscHelper::getDataValue($inputs["agi"], 0)  }}">
                                    <span class="extraText" id="agiExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="agi2" value="{{ MiscHelper::getDataValue($inputs["agi"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('agi');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Vit</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="vitCon" onchange="adjustAttrText('vit');">
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["vit"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="vit" value="{{ MiscHelper::getDataValue($inputs["vit"], 0)  }}">
                                    <span class="extraText" id="vitExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="vit2" value="{{ MiscHelper::getDataValue($inputs["vit"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('vit');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Int</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="intCon" onchange="adjustAttrText('int');">
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["int"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="int" value="{{ MiscHelper::getDataValue($inputs["int"], 0)  }}">
                                    <span class="extraText" id="intExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="int2" value="{{ MiscHelper::getDataValue($inputs["int"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('int');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Dex</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="dexCon" onchange="adjustAttrText('dex');">
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["dex"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="dex" value="{{ MiscHelper::getDataValue($inputs["dex"], 0)  }}">
                                    <span class="extraText" id="dexExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="dex2" value="{{ MiscHelper::getDataValue($inputs["dex"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('dex');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded optCaption">Luk</td>
                                <td class="bgLtRow1 padded optArea">
                                    <select style="width:80px;" id="lukCon" onchange="adjustAttrText('luk');">
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "1") value="1">=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "2") value="2">&gt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "3") value="3">&lt;</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "4") value="4">&gt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "5") value="5">&lt;=</option>
                                        <option @selected(MiscHelper::getOperationType($inputs["luk"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="luk" value="{{ MiscHelper::getDataValue($inputs["luk"], 0)  }}">
                                    <span class="extraText" id="lukExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="luk2" value="{{ MiscHelper::getDataValue($inputs["luk"], 0)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('luk');
                                    </script>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Size</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow1 padded">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="size1" {{ !is_null($inputs["size"]) && MonsterHelper::isCategoryInType($inputs["size"], 1) ? "checked" : "" }}>Small</td>
                                                <td class="checkGrp"><input type="checkbox" id="size2" {{ !is_null($inputs["size"]) && MonsterHelper::isCategoryInType($inputs["size"], 2) ? "checked" : "" }}>Medium</td>
                                                <td class="checkGrp"><input type="checkbox" id="size3" {{ !is_null($inputs["size"]) && MonsterHelper::isCategoryInType($inputs["size"], 3) ? "checked" : "" }}>Large</td>
                                                <td class="checkGrp">&nbsp;</td>
                                                <td class="checkGrp">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Race</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow1 padded">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="race1" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 1) ? "checked" : "" }}>Angel</td>
                                                <td class="checkGrp"><input type="checkbox" id="race3" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 3) ? "checked" : "" }}>Demi-Human</td>
                                                <td class="checkGrp"><input type="checkbox" id="race5" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 5) ? "checked" : "" }}>Dragon</td>
                                                <td class="checkGrp"><input type="checkbox" id="race7" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 7) ? "checked" : "" }}>Formless</td>
                                                <td class="checkGrp"><input type="checkbox" id="race9" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 9) ? "checked" : "" }}>Plant</td>
                                            </tr>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="race2" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 2) ? "checked" : "" }}>Brute</td>
                                                <td class="checkGrp"><input type="checkbox" id="race4" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 4) ? "checked" : "" }}>Demon</td>
                                                <td class="checkGrp"><input type="checkbox" id="race6" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 6) ? "checked" : "" }}>Fish</td>
                                                <td class="checkGrp"><input type="checkbox" id="race8" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 8) ? "checked" : "" }}>Insect</td>
                                                <td class="checkGrp"><input type="checkbox" id="race10" {{ !is_null($inputs["race"]) && MonsterHelper::isCategoryInType($inputs["race"], 10) ? "checked" : "" }}>Undead</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mdSeperator">&nbsp;</div>
                    <div class="bgSmTitle smTitle">Element</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow1 padded">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="eleType1" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 1) ? "checked" : "" }}>Neutral</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType3" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 3) ? "checked" : "" }}>Earth</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType5" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 5) ? "checked" : "" }}>Water</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType7" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 7) ? "checked" : "" }}>Holy</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType9" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 9) ? "checked" : "" }}>Ghost</td>
                                            </tr>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="eleType2" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 2) ? "checked" : "" }}>Fire</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType4" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 4) ? "checked" : "" }}>Wind</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType6" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 6) ? "checked" : "" }}>Poison</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType8" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 8) ? "checked" : "" }}>Shadow</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleType10" {{ !is_null($inputs["eletype"]) && MonsterHelper::isCategoryInType($inputs["eletype"], 10) ? "checked" : "" }}>Undead</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mdSeperator">&nbsp;</div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="checkGrp"><input type="checkbox" id="eleLvl1" {{ !is_null($inputs["elelvl"]) && MonsterHelper::isCategoryInType($inputs["elelvl"], 1) ? "checked" : "" }}>Lv 1</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleLvl2" {{ !is_null($inputs["elelvl"]) && MonsterHelper::isCategoryInType($inputs["elelvl"], 2) ? "checked" : "" }}>Lv 2</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleLvl3" {{ !is_null($inputs["elelvl"]) && MonsterHelper::isCategoryInType($inputs["elelvl"], 3) ? "checked" : "" }}>Lv 3</td>
                                                <td class="checkGrp"><input type="checkbox" id="eleLvl4" {{ !is_null($inputs["elelvl"]) && MonsterHelper::isCategoryInType($inputs["elelvl"], 4) ? "checked" : "" }}>Lv 4</td>
                                                <td class="checkGrp">&nbsp;</td>
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