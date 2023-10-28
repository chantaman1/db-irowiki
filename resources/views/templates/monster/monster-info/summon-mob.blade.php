@if (!is_null($summonMob))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Summon Mob</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    <ul>
                        @foreach ($summonMob as $mob)
                            <li>{{ $mob->amount }} <a href="/db/monster-info/{{ $mob->id }}/">{{ $mob->name }}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endif