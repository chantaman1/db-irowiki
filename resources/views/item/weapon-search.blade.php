@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/item/weapon-search.js') }}"></script>
@endpush

@section('content')
    @include('templates.item.weapon-search.header')
    @include('templates.item.weapon-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["weaponInfo"]))
        @include('templates.item.weapon-search.results', [ "weaponInfo" => $data["weaponInfo"], "weaponSpecial" => $data["weaponSpecial"] ])
    @endif
    @include('layout.footer')
@endsection