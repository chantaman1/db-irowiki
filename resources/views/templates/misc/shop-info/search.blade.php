<tr>
    <td class="padded nowrap" style="width:70%;">
        <form class="blockNormal" onsubmit="return changeShopPage();">
            <select id="categoryMenu" style="width:150px;" onchange="onMapCategoryChange();">
                <option value="All" selected>(All)</option>
                @if (!is_null($maps))
                    @foreach ($maps as $map)
                        <option value="{{ $map->id }}">{{ $map->name }}</option>
                    @endforeach
                @endif
                <option value="">Other</option>
            </select>
            <select id="mainMenu" style="width:300px;">
                @if (!is_null($shopTypes))
                    @foreach ($shopTypes as $shopType)
                        <option value="{{ $shopType->id }}" data-category="{{ $shopType->map_id }}">{{ MiscHelper::getShopName($shopType) }}</option>
                    @endforeach
                @endif
            </select>
            <input type="submit" value="Go">
            &nbsp;
            Search: <input type="text" id="search" style="width:150px;" />
        </form>
    </td>
    <td style="width:30%; text-align:right; font-size:11pt;">
        <a href="/db/settings/">Settings</a>&nbsp;
    </td>
</tr>