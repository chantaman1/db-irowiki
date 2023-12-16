@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/towns.css') }}" rel="stylesheet">
@endsection

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world2.js') }}"></script>
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 4);
        };
    </script>
@endpush

@section('content')
    @include('templates.map.towns.header', [ "mapData" => $mapData])
    @include('templates.map.towns.main')
    @include('layout.footer')
@endsection