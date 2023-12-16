@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/misc/treasure-drops.css') }}" rel="stylesheet">
@endsection

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/misc/treasure-drops.js') }}"></script>
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 5);
        };
    </script>
@endpush

@section('content')
    @if(is_null($data) || !is_null($data['realm']))
        <div class="bgMdTitle mdTitle">Treasure Drops</div>
        <table class="bgDkRow2">
            @include('templates.misc.treasure-drops.search', [ "realmMenu" => $realmMenu ])
        </table>
        @if(!is_null($data) && !is_null($data['realm']))
            <div class="mdSeperator">&nbsp;</div>
            <div class="bgMdTitle mdTitle">{{ $data['realm']->name }}</div>
            <table>
                <tr>
                    @include('templates.misc.treasure-drops.list.common', [ "realm" => $data["realm"] ])
                    @include('templates.misc.treasure-drops.list.castle1', [ "realm" => $data["realm"] ])
                    @include('templates.misc.treasure-drops.list.castle2', [ "realm" => $data["realm"] ])
                </tr>
                <tr>
                    @include('templates.misc.treasure-drops.list.castle3', [ "realm" => $data["realm"] ])
                    @include('templates.misc.treasure-drops.list.castle4', [ "realm" => $data["realm"] ])
                    @include('templates.misc.treasure-drops.list.castle5', [ "realm" => $data["realm"] ])
                </tr>
            </table>
        @endif
    @else
        @include('templates.misc.treasure-drops.error')
    @endif
    @include('layout.footer')
@endsection
