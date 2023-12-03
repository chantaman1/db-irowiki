@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/instance.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script type="text/javascript">
        var mapData = {!! json_encode($mapData) !!};
    </script>
@endpush

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world2.js') }}"></script>
@endpush

@section('content')
    <div id="mapInfo" class="mapInfo"></div>
    <div class="bgMdTitle mdTitle">Instance Map</div>
    <table class="bgLtTable">
        @foreach(array_chunk($instances, 2, true) as $instancePair)
            @php
                $names = array_keys($instancePair);
                $name = $names[0];
                $nextName = isset($names[1]) ? $names[1] : null;
            @endphp
            <tr>
                <td class="bgLtRow1 padded chartName">{{ $name }}</td>
                @foreach($instancePair[$name] as $instanceValue)
                    <td class="bgLtRow1 chartImage">
                        <a href="/db/map-info/{{ $instanceValue }}/">
                            <img src="https://db.irowiki.org/image/map/thumb/{{ $instanceValue }}.png" alt="">
                        </a>
                    </td>
                @endforeach

                @if(count($instancePair[$name]) < 7)
                    <td colspan="{{ 7 - count($instancePair[$name]) }}">&nbsp;</td>
                @endif
                
                @if($nextName)
                    <td class="bgLtRow2 padded chartName">{{ $nextName }}</td>
                    @foreach($instancePair[$nextName] as $instanceValue)
                        <td class="bgLtRow1 chartImage">
                            <a href="/db/map-info/{{ $instanceValue }}/">
                                <img src="https://db.irowiki.org/image/map/thumb/{{ $instanceValue }}.png" alt="">
                            </a>
                        </td>
                    @endforeach
                    @if(count($instancePair[$nextName]) < 7)
                        <td colspan="{{ 7 - count($instancePair[$nextName]) }}">&nbsp;</td>
                    @endif
                @endif
            </tr>
        @endforeach
    </table>
    @include('layout.footer')
@endsection