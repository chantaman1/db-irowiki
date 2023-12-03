@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/new-world.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script type="text/javascript">
        var mapData = {!! json_encode($mapData) !!};
    </script>
@endpush

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world1.js') }}"></script>
@endpush

@section('content')
    <div id="mapInfo" class="mapInfo"></div>
    <div class="bgMdTitle mdTitle">New World Map</div>
    <table class="bgDkRow3">
        <tr>
            <td style="text-align:center;">
                <img src="https://db.irowiki.org/image/map/newworld.jpg" usemap="#map">
            </td>
        </tr>
    </table>

    <!---Coords are top left and bottom right x1, y1, x2, y2--->
    <map name="map">
        <area shape="rect" coords="617,481,660,528" href="/db/map-info/dicastes01/">
        <area shape="rect" coords="617,428,660,480" href="/db/map-info/dicastes02/">
        <area shape="rect" coords="572,529,615,573" href="/db/map-info/dic_dun01/">
        <area shape="rect" coords="617,529,660,573" href="/db/map-info/dic_fild01/">
        <area shape="rect" coords="617,484,660,617" href="/db/map-info/dic_fild02/">
        <area shape="rect" coords="437,484,481,528" href="/db/map-info/mid_camp/">
        <area shape="rect" coords="527,529,571,573" href="/db/map-info/manuk/"     >
        <area shape="rect" coords="482,481,526,528" href="/db/map-info/man_fild01/">
        <area shape="rect" coords="527,481,571,528" href="/db/map-info/man_fild02/">
        <area shape="rect" coords="482,529,526,573" href="/db/map-info/man_fild03/">
        <area shape="rect" coords="381,428,426,480" href="/db/map-info/spl_fild01/">
        <area shape="rect" coords="381,481,426,528" href="/db/map-info/spl_fild02/">
        <area shape="rect" coords="381,529,426,573" href="/db/map-info/spl_fild03/">
        <area shape="rect" coords="337,481,389,528" href="/db/map-info/splendide/">
        <area shape="rect" coords="337,436,382,527" href="/db/map-info/bif_fild01/">
        <area shape="rect" coords="337,391,382,528" href="/db/map-info/bif_fild02/">
        <area shape="rect" coords="337,346,382,391" href="/db/map-info/mora/">
        <area shape="rect" coords="292,414,337,459" href="/db/map-info/1@mist/">
    </map>
    @include('layout.footer')
@endsection