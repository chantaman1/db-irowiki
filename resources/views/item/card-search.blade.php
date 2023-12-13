@extends('layout.app')

@section('styles')
    <link href="{{ asset('/css/common-item-search.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('js/item/card-search.js') }}"></script>
@endpush

@push('bottom-scripts')
    <script>
        $(document).ready(
            setTabSelect('siteMenu', 2)
        )
    </script>
@endpush

@section('content')
    @include('templates.item.card-search.header')
    @include('templates.item.card-search.main', [ "inputs" => $inputs ])
    @if (!is_null($data))
        @include('templates.item.card-search.results', [ "cardInfo" => $data ])
    @endif
    @include('layout.footer')
@endsection