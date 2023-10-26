@extends('layout.app')

@section('scripts')
    <script src="{{ asset('js/gear-search.js')}}"></script>
@endsection

@section('content')
    @include('templates.item.gear-search.header')
    @include('templates.item.gear-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["gearInfo"]) && count($data["gearInfo"]) > 0)
        @include('templates.item.gear-search.results', [ "type" => $inputs["type"], "gearInfo" => $data["gearInfo"], "gearSpecial" => $data["gearSpecial"] ])
    @endif
    @include('layout.footer')
@endsection