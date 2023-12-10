@if (!is_null($elemental))
    <div class="bgSmTitle smTitle">Elemental Damage</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow3 padded eleInfo">Neutral</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[0]->modifier)) !!}</td>
                <td class="bgLtRow3 padded eleInfo">Poison</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[5]->modifier)) !!}</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded eleInfo">Fire</td>
                <td class="bgLtRow2 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[1]->modifier)) !!}</td>
                <td class="bgLtRow4 padded eleInfo">Holy</td>
                <td class="bgLtRow2 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[6]->modifier)) !!}</td>
            </tr>
            <tr>
                <td class="bgLtRow3 padded eleInfo">Earth</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[2]->modifier)) !!}</td>
                <td class="bgLtRow3 padded eleInfo">Shadow</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[7]->modifier)) !!}</td>
            </tr>
            <tr>
                <td class="bgLtRow4 padded eleInfo">Wind</td>
                <td class="bgLtRow2 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[3]->modifier)) !!}</td>
                <td class="bgLtRow4 padded eleInfo">Ghost</td>
                <td class="bgLtRow2 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[8]->modifier)) !!}</td>
            </tr>
            <tr>
                <td class="bgLtRow3 padded eleInfo">Water</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[4]->modifier)) !!}</td>
                <td class="bgLtRow3 padded eleInfo">Undead</td>
                <td class="bgLtRow1 padded eleInfo">{!! html_entity_decode(MonsterHelper::formatElementalDamage($elemental[9]->modifier)) !!}</td>
            </tr>
        </tbody>
    </table>
@endif