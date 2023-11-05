<tr>
    <td class="bgLtRow4 padded infoTitle">Warp Memo</td>
    <td class="bgLtRow2 padded infoText">
        @if(MapHelper::isMemoable($map->flag))
            <img src="https://db.irowiki.org/image/yes.png"> Yes </img>
        @else
            <img src="https://db.irowiki.org/image/no.png"> No </img>
        @endif
    </td>
</tr>