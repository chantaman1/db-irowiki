@if(!is_null($realmMenu))
    <tr>
        <td class="padded nowrap">
            <select id="menu" style="width:200px;">
                <option value="" selected>(Select a realm)</option>
                @foreach($realmMenu as $realm)
                    <option value="{{ $realm->realm }}">{{ $realm->name }}</option>
                @endforeach
            </select>
            <input type="button" value="Go" onclick="javascript:changePage();" />
        </td>
    </tr>
@endif