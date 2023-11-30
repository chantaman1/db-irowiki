@if (!is_null($skills))
<div class="mdSeperator">&nbsp;</div>
<table class="bgSmTitle">
    <tbody>
        <tr>
            <td class="smTitle" style="width:40%; padding-left:4px;">Skills</td>
            <td style="width:60%; text-align:right; padding-right:4px;"><a href="/db/monster-skill/{{ $monster->id }}/">(Details)</a></td>
        </tr>
    </tbody>
</table>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1 padded">
                <ul>
                    @foreach ($skills as $skill)
                        <li>Lv {{ $skill->level }} {{ $skill->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </tbody>
</table>
@endif