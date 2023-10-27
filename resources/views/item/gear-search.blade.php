@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/item/gear-search.js') }}"></script>
@endpush

@section('content')
    @include('templates.item.gear-search.header')
    @include('templates.item.gear-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["gearInfo"]))
        @include('templates.item.gear-search.results', [ "type" => $inputs["type"], "gearInfo" => $data["gearInfo"], "gearSpecial" => $data["gearSpecial"] ])
    @endif
    @include('layout.footer')
@endsection