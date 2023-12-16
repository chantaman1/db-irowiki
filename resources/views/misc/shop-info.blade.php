@extends('layout.app')

@push('bottom-scripts')
    <script src="{{ asset('/js/misc/shop-info.js') }}" type="text/javascript"></script>
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 5);
        };
    </script>
@endpush

@section('content')
    @if(is_null($data) || !is_null($data['shop']) )
        <div class="bgMdTitle mdTitle">Shop Info</div>
        <table class="bgDkRow2">
            @include('templates.misc.shop-info.search', [ "maps" => $menuCategories, "shopTypes" => $menuData ])
        </table>
        @if(!is_null($data) && !is_null($data['shop']))
            @include('templates.misc.shop-info.title', [ 'shop' => $data['shop'] ])
            <table>
                <tr>
                    @include('templates.misc.shop-info.items', [ 'shopItems' => $data['items'] ])
                    @include('templates.misc.shop-info.location', [ 'shop' => $data['shop'] ])
                </tr>
            </table>
        @endif
    @else
        @include('templates.misc.shop-info.error')
    @endif
    @include('layout.footer')
@endsection