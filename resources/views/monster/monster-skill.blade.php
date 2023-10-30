@extends('layout.app')

@push('scripts')
    <script src="{{ asset('js/monster/monster-skill.js') }}"></script>
@endpush

@section('content')
    @include('templates.monster.monster-skill.navbar', [ "menuCategories" => $menuCategories, "menuMonsters" => $submenuMonsters ])

    @include('layout.footer')
@endsection