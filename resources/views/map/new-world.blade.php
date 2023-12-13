@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/new-world.css') }}" rel="stylesheet">
@endsection

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world1.js') }}"></script>
    <script>
        $(document).ready(
            setTabSelect('siteMenu', 4)
        )
    </script>
@endpush

@section('content')
    @include('templates.map.new-world.header', [ "mapData" => $mapData ])
    @include('templates.map.new-world.main')
    @include('layout.footer')
@endsection