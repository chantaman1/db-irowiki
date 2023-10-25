@extends('layout.app')

@section('scripts')
    <script src="{{ asset('js/weapon-search.js')}}"></script>
@endsection

@section('content')
    @include('templates.item.weapon-search.header')
    @include('templates.item.weapon-search.main')
    @include('templates.item.weapon-search.results')
    @include('layout.footer')
@endsection