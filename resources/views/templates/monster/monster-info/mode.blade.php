@if (!is_null($mode))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Mode</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    <ul>
                        @foreach (MonsterHelper::getModeAIList($mode->level, $mode->mode, $mode->ai) as $data)
                            <li>{{ $data }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endif