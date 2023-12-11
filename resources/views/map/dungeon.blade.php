@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/dungeon.css') }}" rel="stylesheet">
@endsection

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world2.js') }}"></script>
@endpush

@section('content')
    @include('templates.map.dungeon.header', [ "mapData" => $mapData ])
    @include('templates.map.dungeon.main', [ "dungeons" => $dungeons ])
    @include('layout.footer')
@endsection