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
<div class="bgSmTitle smTitle">Char Server</div>
<table class="bgLtTable">
    <tbody>
        <tr>
            <td class="bgLtRow1">
                <table class="bgLtRow1">
                    <tbody>
                        <tr>
                            @foreach($data["char"] as $serv)
                                @foreach($serv as $char)
                                    @if (ToolHelper::getServerStatus($char["status"]) === 2)
                                        <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> {{ $char["name"] }}</td>
                                    @else
                                        <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> {{ $char["name"] }}</td>
                                    @endif
                                @endforeach
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
                        @foreach(array_chunk($data["map"]["chaos"], 3) as $mapChunk)
                            <tr>
                                @foreach($mapChunk as $mapSv)
                                    @if (ToolHelper::getServerStatus($mapSv["status"]) === 2)
                                        <td class="padded"><img src="https://db.irowiki.org/image/greendot.png"> {{ $mapSv["name"] }}</td>
                                    @else
                                        <td class="padded"><img src="https://db.irowiki.org/image/reddot.png"> {{ $mapSv["name"] }}</td>
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