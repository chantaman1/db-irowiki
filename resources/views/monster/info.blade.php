@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/monster/info.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/monster/info.js') }}"></script>
@endpush

@push('bottom-scripts')
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 3);
        };
    </script>
@endpush

@section('content')
    @include('templates.monster.info.navbar', [ "menuCategories" => $menuCategories, "menuMonsters" => $submenuMonsters ])
    @if (!is_null($data) && !is_null($data["monster"]))
        <div class="mdSeperator">&nbsp;</div>
        @include('templates.monster.info.header', [ "monster" => $data["monster"] ])
        <table>
            <tbody>
                <tr style="height:20%;">
                    <td style="width:24%; vertical-align:top;">
                        @include('templates.monster.info.image', [ "monster" => $data["monster"] ])
                        @include('templates.monster.info.mode', [ "mode" => $data["mode"] ])
                    </td>
                    <td style="vertical-align:top; width:52%;">
                        @include('templates.monster.info.main', [ "monster" => $data["monster"] ])
                        @include('templates.monster.info.drops', [ "drops" => $data["normalDrops"] ])
                        @include('templates.monster.info.mvp-drops', [ "drops" => $data["mvpDrops"] ])
                    </td>
                    <td style="vertical-align:top; width:24%;">
                        @include('templates.monster.info.elemental-damage', [ "elemental" => $data["elementChart"] ])
                        @include('templates.monster.info.skills', [ "monster" => $data["monster"], "skills" => $data["skills"] ])
                        @include('templates.monster.info.summoned-by', [ "summonList" => $data["summonList"] ])
                        @include('templates.monster.info.summon-mob', [ "summonMob" => $data["summonMob"] ])
                        @include('templates.monster.info.spawn-mob', [ "spawnMob" => $data["spawnMob"] ])
                        @include('templates.monster.info.metamorphosis', [ "meta" => $data["metamorphosis"] ])
                    </td>
                </tr>
            </tbody>
        </table>
        @include('templates.monster.info.map-locations', [ "mapInfo" => $data["mapList"] ])
    @endif
    @include('layout.footer')
@endsection