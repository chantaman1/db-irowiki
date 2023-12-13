@extends('layout.app')

@push('scripts')
    <script src="{{ asset('js/monster/skill.js') }}"></script>
@endpush

@push('bottom-scripts')
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 3);
        };
    </script>
@endpush

@section('content')
    @include('templates.monster.skill.navbar', [ "menuCategories" => $menuCategories, "menuMonsters" => $submenuMonsters ])
    @if($data != null)
        @include('templates.monster.skill.main', [ "data" => $data ])
    @endif
    @include('layout.footer')
@endsection