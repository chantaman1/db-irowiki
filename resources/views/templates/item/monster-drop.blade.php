@if (!is_null($monsterData))
    <tr>
        <td colspan="3">
            <div class="bgSmTitle smTitle">Monster Drops</div>
            <table class="bgLtTable">
                <tbody>
                    <tr>
                        <td class="bgHeader2 padded" style="width:4%;">Lv</td>
                        <td class="bgHeader1 padded" style="width:20%;">Monster</td>
                        <td class="bgHeader2 padded" style="width:10%;">Rate</td>
                        <td class="bgHeader1 padded" style="width:30%;">Highest Spawn</td>
                        <td class="bgHeader2 padded" style="width:12%;">Element</td>
                        <td class="bgHeader1 padded" style="width:12%;">95% Flee</td>
                        <td class="bgHeader2 padded" style="width:12%;">100% Hit</td>
                    </tr>
                    @foreach ($monsterData as $monster)
                        <tr>
                            <td class="bgLtRow2 padded">{{ $monster->level }}</td>
                            <td class="bgLtRow1 padded"><a href="/db/monster-info/{{ $monster->id }}/">{{ $monster->name }}</a></td>
                            <td class="bgLtRow2 padded">{{ ItemHelper::getDropRate($monster->rate, true) }}</td>
                            <td class="bgLtRow1 padded">{!! html_entity_decode(ItemHelper::getMonsterSpawn($monster->id, $monsterSpawn)) !!}</td>
                            <td class="bgLtRow2 padded">{{ $monster->eleType !== -1 ? ItemHelper::getElementName($monster->eleType)." $monster->eleLvl" : "??" }}</td>
                            <td class="bgLtRow1 padded">{{ $monster->flee }}</td>
                            <td class="bgLtRow2 padded">{{ $monster->hit }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
@endif