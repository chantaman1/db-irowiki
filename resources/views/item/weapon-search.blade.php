@extends('layout.app')

@section('scripts')
    <script src="{{ asset('js/weapon-search.js')}}"></script>
@endsection

@section('content')
    @include('templates.item.weapon-search.header')
    @include('templates.item.weapon-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["weaponInfo"]) && count($data["weaponInfo"]) > 0)
        @include('templates.item.weapon-search.results', [ "weaponInfo" => $data["weaponInfo"], "weaponSpecial" => $data["weaponSpecial"] ])
    @endif
    @include('layout.footer')
@endsection