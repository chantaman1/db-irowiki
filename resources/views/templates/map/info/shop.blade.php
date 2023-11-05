@if(!is_null($mapShops))
    <div class="bgSmTitle smTitle">Shops</div>
    <table class="bgLtTable">
        @foreach($mapShops as $shop)
            <tr>
                <td class="bgLtRow{{ (($loop->index) % 2) + 1 }} padded">
                    <a href="/db/shop-info/{{ $shop->id }}/">{{ $shop->name }}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endif