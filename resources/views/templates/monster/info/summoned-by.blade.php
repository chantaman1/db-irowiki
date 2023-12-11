@if (!is_null($summonList))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Summoned By</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    <ul>
                        @foreach ($summonList as $mob)
                            <li><a href="/db/monster-info/{{ $mob->id }}/">{{ $mob->name }}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endif