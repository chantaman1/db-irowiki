@if (!is_null($meta))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Metamorphosis</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgLtRow1 padded">
                    <ul>
                        @foreach ($meta as $monster)
                            <li>{{ $monster->amount !== -1 ? $monster->amount : "??" }} <a href="/db/monster-info/{{ $monster->monster }}/">{{ $monster->name }}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endif