<td style="width:20%; vertical-align:top;">
    @foreach($arrowCategories as $arrowCategory => $arrows)
        <div class="bgSmTitle smTitle menuTitle" onclick="toggleMenu(this)">{{ $arrowCategory }} Arrows</div>
        <div id="arrowCat{{ $loop->iteration }}" class="arrowList" style="display: {{ $loop->iteration == 1 ? 'block' : 'none' }}">
            <table class="bgLtTable">
                @foreach($arrows as $arrow)
                    @php
                        $color = MiscHelper::toggleColor();    
                    @endphp
                    <tr>
                        <td class="bgLtRow{{ $color + 1 }} padded arrowImg">
                            <img src="https://db.irowiki.org/image/item/{{ $arrow['id'] }}.png" />
                        </td>
                        <td class="bgLtRow{{ $color }} padded arrowName">
                            <a href="javascript:arrowInfo({{ $arrow['id'] }});">{{ $arrow['name'] }}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endforeach
</td>