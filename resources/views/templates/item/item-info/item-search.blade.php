<tr>
    <td class="padded nowrap" style="width:70%;">
        <form class="blockNormal" onsubmit="return changeItemPage();">
            <select name="categoryMenu" id="categoryMenu" style="width:120px;">
                @if (!is_null($menuCatData))
                    <option value="0">(All)</option>
                    @foreach ($menuCatData as $cat)
                        <option value="{{ $cat->category }}">{{ $cat->name }}</option>
                    @endforeach
                @endif
            </select>
            <select id="subcatMenu" style="width:120px;">
                @if (!is_null($menuSubCat))
                    <option value="0">(All)</option>
                    @foreach ($menuSubCat as $subcat)
                        <option value="{{ $subcat->category }}">{{ $subcat->name }}</option>
                    @endforeach
                @endif
            </select>
            <select id="mainMenu" style="width:260px;">
                @if (!is_null($menuData))
                    @foreach ($menuData as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif
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