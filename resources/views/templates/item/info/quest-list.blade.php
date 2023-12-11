@if (!is_null($questData))
    <tr>
        <td colspan="3">
            <div class="bgSmTitle smTitle">Quests</div>
            <table class="bgLtTable">
                <tbody>
                    <tr>
                        <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                        <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                        <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                        <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                        <td class="bgHeader1 padded" style="width:27%;">Quest Name</td>
                        <td class="bgHeader2 padded" style="width:6%;">Amount</td>
                    </tr>
                    @foreach ($questData as $questType => $questList)
                        @if(!is_null($questList))
                            <tr>
                                <td class="bgSmTitle padded" colspan="6">{{ $questType }}</td>
                            </tr>
                            @foreach (array_chunk($questList->toArray(), 3) as $questChunk)
                                <tr>
                                    @for ($i = 0; $i < 3; $i++)
                                        @if (isset($questChunk[$i]))
                                            <td class="bgLtRow1 padded"><a href="https://irowiki.org/wiki/{{ $questChunk[$i]["wiki"] }}">{{ $questChunk[$i]["name"] }}</a></td>
                                            <td class="bgLtRow2 padded">{{ $questChunk[$i]["amount"] === 0 ? "(Varies)" : ($questChunk[$i]["amount"] === -1 ? "??" : "x ".number_format($questChunk[$i]["amount"])) }}</td>
                                        @else
                                            <td class="bgLtRow1 padded"></td>
                                            <td class="bgLtRow2 padded"></td>
                                        @endif
                                    @endfor
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
@endif