<tr>
	<td class="padded nowrap" style="width:70%;">
		<form class="blockNormal" onsubmit="return changeMapPage();">
            <select id="categoryMenu" style="width:150px;" onchange="onMapCategoryChange();">
                <option value="0" selected>(All)</option>
                @if (!is_null($mapTypes))
                    @foreach ($mapTypes as $mapType)
                        <option value="{{ $mapType->category }}">{{ $mapType->name }}</option>
                    @endforeach
                @endif
            </select>
			<select id="mainMenu" style="width:300px;">
                @if (!is_null($maps))
                    @foreach ($maps as $map)
                        <option value="{{ $map->id }}">{{ $map->name }}</option>
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