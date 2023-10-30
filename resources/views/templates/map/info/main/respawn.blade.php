<tr>
    <td class="bgLtRow3 padded infoTitle">Logout Safe</td>
    <td class="bgLtRow1 padded infoText">
        @if(MapHelper::canRespawn($map->flag))
            <img src="https://db.irowiki.org/image/no.png"> No </img>
        @else
            <img src="https://db.irowiki.org/image/yes.png"> Yes </img>
        @endif
    </td>
</tr>