<tr>
    <td class="bgLtRow4 padded infoTitle">Experience Loss</td>
    <td class="bgLtRow2 padded infoText">
        @if(MapHelper::expLosable($map->flag))
            <img src="https://db.irowiki.org/image/red-yes.png"> Yes </img>
        @else
            <img src="https://db.irowiki.org/image/green-no.png"> No </img>
        @endif
    </td>
</tr>