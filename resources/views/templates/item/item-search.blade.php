<tr>
    <td class="padded nowrap" style="width:70%;">
        <form class="blockNormal" onsubmit="return changeItemPage();">
            <select name="categoryMenu" id="categoryMenu" style="width:120px;">
                @if (!is_null($menuCatData))
                    <option value="0">(All)</option>
                    @foreach ($menuCatData as $menuItem)
                        <option @selected($menuItem->category === 1) value="{{ $menuItem->category }}">{{ $menuItem->name }}</option>
                    @endforeach
                @endif
            </select>
            <select id="subcatMenu" style="width:120px;">
                @if (!is_null($menuSubCat))
                    <option value="0">(All)</option>
                    @foreach ($menuSubCat as $menuItem)
                        <option @selected($menuItem->category === 1) value="{{ $menuItem->category }}">{{ $menuItem->name }}</option>
                    @endforeach
                @endif
            </select>
            <select id="mainMenu" style="width:260px;">
            </select>
            <input type="submit" value="Go">
            &nbsp;
            Search: <input type="text" id="search" style="width:150px;"/>
        </form>
    </td>
    <td style="width:30%; text-align:right; font-size:11pt;">
        <a href="/db/settings/">Settings</a>&nbsp;
    </td>
</tr>