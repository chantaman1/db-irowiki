@extends('layout.app')

@section('content')
<div class="bgMdTitle mdTitle">Server Status</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1">
                <table class="bgLtRow1">
                    <tbody>
                        <tr>
                            @if (ToolHelper::getGlobalStatus(1, $data) === 2)
                                <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> Login Server</td>
                            @else
                                <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> Login Server</td>
                            @endif
                            @if (ToolHelper::getGlobalStatus(2, $data) === 2)
                                <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> Char Server</td>
                            @elseif (ToolHelper::getGlobalStatus(2, $data) === 1)
                                <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> Char Server</td>
                            @else
                                <td class="padded"><img src="https://db.irowiki.org/image/orangedot.png"> Char Server</td>
                            @endif
                            @if (ToolHelper::getGlobalStatus(3, $data) === 2)
                                <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> Map Server</td>
                            @elseif (ToolHelper::getGlobalStatus(3, $data) === 1)
                                <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> Map Server</td>
                            @else
                                <td class="padded"><img src="https://db.irowiki.org/image/orangedot.png"> Map Server</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<div class="bgSmTitle smTitle">Login Server</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1">
                <table class="bgLtRow1">
                    <tbody>
                        <tr>
                            @if (ToolHelper::getGlobalStatus(1, $data) === 2)
                                <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> Login Server</td>
                            @else
                                <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> Login Server</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<div class="bgSmTitle smTitle">Char Server - Chaos</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1">
                <table class="bgLtRow1">
                    <tbody>
                        <tr>
                            @foreach($data["Char"]["Chaos"] as $char)
                                @if (ToolHelper::getServerStatus($char["Status"]) === 2)
                                    <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> {{ $char["Name"] }}</td>
                                @else
                                    <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> {{ $char["Name"] }}</td>
                                @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<div class="bgSmTitle smTitle">Map Server - Chaos</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1">
                <table class="bgLtRow1">
                    <tbody>
                        @foreach(array_chunk($data["Map"]["Chaos"], 3) as $mapChunk)
                            <tr>
                                @foreach($mapChunk as $mapSv)
                                    @if (ToolHelper::getServerStatus($mapSv["Status"]) === 2)
                                        <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> {{ $mapSv["Name"] }}</td>
                                    @else
                                        <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> {{ $mapSv["Name"] }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection