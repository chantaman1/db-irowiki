<td style="width:50%; vertical-align:top;">
    <table class="bgSmTitle">
        <tr>
            <td class="smTitle">&nbsp;Location</td>
        </tr>
    </table>
    <table class="bgLtTable">
        <tr>
            <td class="bgLtRow1 padded">
                @if($shop->indoor)
                    Inside the building at            
                @endif
                {{ $shop->coorX }}, {{ $shop->coorY }} in 
                <a href="/db/map-info/{{ $shop->map_id }}">
                    {{ $shop->map_name }}
                </a>
            </td>
        </tr>
    </table>
    <table class="bgDkTable" style="width:256px;">
        <tr>
            <td class="bgDkRow5">
                <img style="position:absolute;" src="https://db.irowiki.org/image/map/shop/{{ $shop->id }}.png" />
                <img src="https://db.irowiki.org/image/map/normal/{{ $shop->map_id }}.jpg" />
            </td>
        </tr>
    </table>
</td>