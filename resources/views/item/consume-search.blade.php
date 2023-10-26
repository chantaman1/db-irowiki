@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@section('scripts')
    <script src="{{ asset('js/consume-search.js')}}"></script>
@endsection

@section('content')
    @include('templates.item.consume-search.header')
    @include('templates.item.consume-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data) && !is_null($data["consumeInfo"]))
        @include('templates.item.consume-search.results', [ "consumeInfo" => $data["consumeInfo"], "consumeSpecial" => $data["consumeSpecial"] ])
    @endif
    @include('layout.footer')
@endsection