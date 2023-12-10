@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/monster/search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/monster/search.js') }}"></script>
@endpush

@section('content')
    @include('templates.monster.search.header')
    @include('templates.monster.search.main', [ "inputs" => $inputs ])
    @include('templates.monster.search.results', [ "header" => $inputs["header"], "ltype" => $inputs["ltype"], "monsters" => $data ])
    @include('layout.footer')
@endsection