@if (!is_null($treasureData))
    <div class="bgSmTitle smTitle">Guild Treasure Drops</div>
    <table class="bgLtTable">
        <tbody>
            <tr>
                <td class="bgHeader1 padded" style="width:70%;">Castle</td>
                <td class="bgHeader2 padded" style="width:30%;">Rate</td>
            </tr>
            @foreach ($treasureData as $treasure)
                <tr>
                    <td class="bgLtRow1 padded">
                        <a href="/db/treasure-drops/{{ $treasure->url }}/">
                            @if ($treasure->realm === 0)
                                {{ $treasure->name }} #{{ $treasure->castle }}
                            @elseif ($treasure->realm > 0 && $treasure->castle > 0)
                                {{ $treasure->name }} {{ $treasure->castle }}
                            @else
                                {{ $treasure->name }}
                            @endif
                        </a>
                    </td>
                    <td class="bgLtRow2 padded">{{ ItemHelper::getDropRate($treasure->rate, true) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif