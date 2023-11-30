@if (!is_null($exp))
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">Experience table</div>
    <table>
        <tbody>
            <tr>
                <td class="bgLtRow1 padded" style="width:20%;">Player level</td>
                <td class="bgLtRow2 padded" style="width:20%;">EXP Yield %</td>
                <td class="bgLtRow1 padded" style="width:30%;">Base Exp</td>
                <td class="bgLtRow2 padded" style="width:30%;">Job Exp</td>
            </tr>
            @foreach ($exp as $row)
                <tr>
                    <td class="bgLtRow3 padded" style="width:20%;">{{ $row["level"] }}</td>
                    <td class="bgLtRow4 padded" style="width:20%;">{{ $row["percent"] }}%</td>
                    <td class="bgLtRow3 padded" style="width:30%;">{{ number_format($row["expBase"]) }}</td>
                    <td class="bgLtRow4 padded" style="width:30%;">{{ number_format($row["expJob"]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif