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
                        <td class="bgLtRow3 padded optCaption">Adjective</td>
                        <td class="bgLtRow1 padded optArea">
                            <input type="text" style="width:240px;" id="adjective" name="adjective" value="{{ !is_null($inputs["adjective"]) ? $inputs["adjective"] : "" }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="bgLtRow4 padded optCaption">Type</td>
                        <td class="bgLtRow2 padded optArea">
                            <select style="width:190px;" id="type" name="type">
                                <option value="">(Any)</option>
                                @for ($ctr = 1; $ctr <= 7; $ctr++)
                                    <option @selected(!is_null($inputs["type"]) && $ctr == $inputs["type"]) value="{{ $ctr }}">{{ ItemHelper::getItemTypeName(3, $ctr) }}</option>
                                @endfor
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
                                <option @selected(ItemHelper::getSortType($inputs["sort"]) === "2") value="2">Gear</option>
                            </select>
                            <select style="width:70px;" id="sortDir" name="sortDir">
                                <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "1") value="1">Asc</option>
                                <option @selected(ItemHelper::getSortDir($inputs["sort"]) === "2") value="2">Desc</option>
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