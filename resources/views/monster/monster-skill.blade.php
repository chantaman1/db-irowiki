@extends('layout.app')

@push('scripts')
    <script src="{{ asset('js/monster/monster-skill.js') }}"></script>
@endpush

@section('content')
    @include('templates.monster.monster-skill.navbar', [ "menuCategories" => $menuCategories, "menuMonsters" => $submenuMonsters ])
    @if($data != null)
        @include('templates.monster.monster-skill.main', [ "data" => $data ])
    @endif
    @include('layout.footer')
@endsection