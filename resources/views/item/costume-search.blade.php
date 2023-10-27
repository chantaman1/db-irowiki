@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/item/costume-search.js') }}"></script>
@endpush

@section('content')
    @include('templates.item.costume-search.header')
    @include('templates.item.costume-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["costumeInfo"]))
        @include('templates.item.costume-search.results', [ "type" => $inputs["type"], "costumeInfo" => $data["costumeInfo"], "costumeSpecial" => $data["costumeSpecial"] ])
    @endif
    @include('layout.footer')
@endsection