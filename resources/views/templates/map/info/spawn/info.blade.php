@if(count($groups) > 0)
    <div class="bgSmTitle smTitle">Monster Spawns</div>
    <table class="bgLtTable">
        <tr>
            <td class="bgHeader3 padded" style="width:2%;">&nbsp;</td>
            <td class="bgHeader2 padded" style="width:4%;">Lv</td>
            <td class="bgHeader1 padded" style="width:16%;">Name</td>
            <td class="bgHeader2 padded" style="width:6%;">Amt</td>
            <td class="bgHeader1 padded" style="width:10%;">Respawn</td>
            <td class="bgHeader2 padded" style="width:10%;">HP</td>
            <td class="bgHeader1 padded" style="width:10%;">Element</td>
            <td class="bgHeader2 padded" style="width:5%;">Race</td>
            <td class="bgHeader2 padded" style="width:5%;">Size</td>
            <td class="bgHeader1 padded" style="width:8%;">Def</td>
            <td class="bgHeader2 padded" style="width:8%;">MDef</td>
            <td class="bgHeader1 padded" style="width:8%;">95% Flee</td>
            <td class="bgHeader2 padded" style="width:8%;">100% Hit</td>
        </tr>
        @foreach($groups as $group)
            @include('templates.map.info.spawn.group-name', [ "groupName" => $group['groupName'] ])
            @include('templates.map.info.spawn.monsters', [ "monsters" => $group['spawns'] ])
        @endforeach
    </table>
@endif