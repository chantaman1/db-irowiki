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
                                <td class="bgLtRow4 padded optCaption">HP</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="hpCon" name="hpCon" onchange="adjustAttrText('reqlv');">
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["hp"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="hp" name="hp" value="{{ ItemHelper::getDataValue($inputs["hp"], 0)  }}">
                                    <span class="extraText" id="hpExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="hp2" name="hp2" value="{{ ItemHelper::getDataValue($inputs["hp"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('hp');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">SP</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="spCon" name="spCon" onchange="adjustAttrText('reqlv');">
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["sp"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="sp" name="sp" value="{{ ItemHelper::getDataValue($inputs["sp"], 0)  }}">
                                    <span class="extraText" id="spExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="sp2" name="sp2" value="{{ ItemHelper::getDataValue($inputs["sp"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('sp');
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
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Price</td>
                                <td class="bgLtRow2 padded optArea">
                                    <select style="width:80px;" id="priceCon" name="priceCon" onchange="adjustAttrText('reqlv');">
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "1") value="1">=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "2") value="2">&gt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "3") value="3">&lt;</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "4") value="4">&gt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "5") value="5">&lt;=</option>
                                        <option @selected(ItemHelper::getOperationType($inputs["price"]) === "6") value="6">Between</option>
                                    </select>
                                    <input type="text" style="width:100px;" id="price" name="price" value="{{ ItemHelper::getDataValue($inputs["price"], 0)  }}">
                                    <span class="extraText" id="priceExtra" style="visibility: hidden;">
                                        and <input type="text" style="width:100px;" id="price2" name="price2" value="{{ ItemHelper::getDataValue($inputs["price"], 1)  }}">
                                    </span>
                                    <script type="text/javascript">
                                        adjustAttrText('price');
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">NPC Buyable</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="checkbox" id="npcbuyable" name="npcbuyable" value="npcbuyable" {{ is_null($inputs["npcbuyable"]) ? '' : 'checked' }} />
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded optCaption">Can Buy Shop</td>
                                <td class="bgLtRow2 padded optArea">
                                    <input type="checkbox" id="buyshop" name="buyshop" value="buyshop" {{ is_null($inputs["buyshop"]) ? '' : 'checked' }} />
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