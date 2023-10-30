<tr>
    <td class="bgLtRow3 padded infoTitle">Teleport Allowed</td>
    <td class="bgLtRow1 padded infoText">
        @if(MapHelper::canTeleport($map->flag))
            <img src="https://db.irowiki.org/image/yes.png"> Yes </img>
        @else
            <img src="https://db.irowiki.org/image/no.png"> No </img>
        @endif
    </td>
</tr>