@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/monster/monster-info.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/monster/monster-info.js') }}"></script>
@endpush

@section('content')
    @include('templates.monster.monster-info.navbar', [ "menuCategories" => $menuCategories, "menuMonsters" => $submenuMonsters ])
    @if (!is_null($data) && !is_null($data["monster"]))
        <div class="mdSeperator">&nbsp;</div>
        @include('templates.monster.monster-info.header', [ "monster" => $data["monster"] ])
        <table>
            <tbody>
                <tr style="height:20%;">
                    <td style="width:24%; vertical-align:top;">
                        @include('templates.monster.monster-info.image', [ "monster" => $data["monster"] ])
                        @include('templates.monster.monster-info.mode', [ "mode" => $data["mode"] ])
                    </td>
                    <td style="vertical-align:top; width:52%;">
                        @include('templates.monster.monster-info.main', [ "monster" => $data["monster"] ])
                        @include('templates.monster.monster-info.drops', [ "drops" => $data["normalDrops"] ])
                        @include('templates.monster.monster-info.mvp-drops', [ "drops" => $data["mvpDrops"] ])
                    </td>
                    <td style="vertical-align:top; width:24%;">
                        @include('templates.monster.monster-info.elemental-damage', [ "elemental" => $data["elementChart"] ])
                        @include('templates.monster.monster-info.skills', [ "monster" => $data["monster"], "skills" => $data["skills"] ])
                        @include('templates.monster.monster-info.summoned-by', [ "summonList" => $data["summonList"] ])
                        @include('templates.monster.monster-info.summon-mob', [ "summonMob" => $data["summonMob"] ])
                        @include('templates.monster.monster-info.spawn-mob', [ "spawnMob" => $data["spawnMob"] ])
                        @include('templates.monster.monster-info.metamorphosis', [ "meta" => $data["metamorphosis"] ])
                    </td>
                </tr>
            </tbody>
        </table>
        @include('templates.monster.monster-info.map-locations', [ "mapInfo" => $data["mapList"] ])
    @endif
    @include('layout.footer')
@endsection