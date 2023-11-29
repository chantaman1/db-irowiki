@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/monster/monster-search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/monster/monster-search.js') }}"></script>
@endpush

@section('content')
    @include('templates.monster.monster-search.header')
    @include('templates.monster.monster-search.main', [ "inputs" => $inputs ])
    @include('templates.monster.monster-search.results', [ "header" => $inputs["header"], "ltype" => $inputs["ltype"], "monsters" => $data ])
    @include('layout.footer')
@endsection