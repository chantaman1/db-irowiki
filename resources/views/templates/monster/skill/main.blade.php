<div class="mdSeperator">&nbsp;</div>
<div class="bgSmTitle smTitle">{{ $data["monsterNotes"]->name }}</div>
<table class="bgLtTable">
    <tr>
        <td class="bgHeader3 padded" style="width:2%;">&nbsp;</td>
        <td class="bgHeader1 padded" style="width:20%;">Skill</td>
        <td class="bgHeader2 padded" style="width:8%;">Target</td>
        <td class="bgHeader1 padded" style="width:8%;">Chance</td>
        <td class="bgHeader2 padded" style="width:10%;">Cast</td>
        <td class="bgHeader1 padded" style="width:10%;">Delay</td>
        <td class="bgHeader2 padded" style="width:8%;">Emote</td>
        <td class="bgHeader1 padded" style="width:34%;">Condition / Mode Change</td>
    </tr>
    @foreach($data["monsterStates"] as $stateData)
        <tr>
            <td class="bgSmTitle padded" colspan="9">{{ MonsterHelper::getStateName($stateData["state"]) }}</td>
        </tr>
        @foreach($stateData["skills"] as $skill)
            <tr>
                <td class="bgLtRow3 padded centered">{!! html_entity_decode(MonsterHelper::getCastType($skill->cast, $skill->interupt)) !!}</td>
                <td class="bgLtRow1 padded">{{ $skill->level != -1 ? "Lv {$skill->level}" : "" }} {{ $skill->name }}</td>
                <td class="bgLtRow2 padded">{{ MonsterHelper::getTargetName($skill->target) }}</td>
                <td class="bgLtRow1 padded">{{ $skill->chance === -1 ? "??" : MonsterHelper::formatChance($skill->chance) }}</td>
                <td class="bgLtRow2 padded">{{ $skill->cast === -1 ? "??" : ( $skill->cast === 0 ? "--" : MiscHelper::formatTime($skill->cast / 100) ) }}</td>
                <td class="bgLtRow1 padded">{{ $skill->delay === -1 ? "??" : ( $skill->delay === 0 ? "--" : MiscHelper::formatTime($skill->delay / 100) ) }}</td>
                <td class="bgLtRow2 padded">{{ $skill->emote }}</td>
                <td class="bgLtRow1 padded">{{ $skill->mode ? MonsterHelper::getMode($skill->mode) : MonsterHelper::getCondition($skill->cond, $skill->param) }}</td>
            </tr>
        @endforeach
    @endforeach
</table>