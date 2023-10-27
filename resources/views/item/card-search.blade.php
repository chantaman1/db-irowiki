@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@section('scripts')
    <script src="{{ asset('js/card-search.js')}}"></script>
@endsection

@section('content')
    @include('templates.item.card-search.header')
    @include('templates.item.card-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data))
        @include('templates.item.card-search.results', [ "cardInfo" => $data ])
    @endif
    @include('layout.footer')
@endsection