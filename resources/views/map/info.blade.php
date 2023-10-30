@extends('layout.app')

@push('scripts')
    <script src="{{ asset('js/map/map-info.js') }}"></script>
@endpush

@section('content')
    @if(is_null($data) || !is_null($data['map']) )
        <div class="bgMdTitle mdTitle">Map Info</div>
        <table class="bgDkRow1">
            @include('templates.map.info.search', [ "mapTypes" => $categoryMenu, "maps" => $menuData ])
        </table>
        @if(!is_null($data) && !is_null($data['map']))
            @include('templates.map.info.title', ['map' => $data['map']])
            <table>
                <tbody>
                    <tr>
                        <td style="width:40%; vertical-align:top;">
                            <div class="bgSmTitle smTitle">Main</div>
                            <table class="bgLtTable">
                                @include('templates.map.info.main.type', ['mapType' => $data['mapType']])
                                @include('templates.map.info.main.zone-info', ['zoneInfo' => $data['zoneInfo']])
                                <tr><td></td></tr>
                                @include('templates.map.info.main.teleport', ['map' => $data['map']])
                                @include('templates.map.info.main.memo', ['map' => $data['map']])
                                @include('templates.map.info.main.dead-branch', ['map' => $data['map']])
                                @include('templates.map.info.main.exp-loss', ['map' => $data['map']])
                                @include('templates.map.info.main.respawn', ['map' => $data['map']])
                                @include('templates.map.info.main.vip', ['map' => $data['map']])
                            </table>
                            @include('templates.map.info.bgm', ['bgm' => $data['mapBGM']])
                        </td>
                        <td style="width:256px; vertical-align:top;">
                            @include('templates.map.info.image', ['map' => $data['map']])
                        </td>
                        <td style="width:40%; vertical-align:top;">
                            @include('templates.map.info.shop', [ "mapShops" => $data["mapShops"] ])
                        </td>
                    </tr>
                </tbody>
            </table><--SPAWNS-->
        @endif
    @else
        @include('templates.map.map-info.map-error')
    @endif
    @include('layout.footer')
@endsection