@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/misc/arrow-craft.css') }}" rel="stylesheet">
@endsection

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/misc/arrow-craft.js') }}"></script>
    <script>
        document.getElementById("pageBody").onload = function() {
            setTabSelect('siteMenu', 5);
        };
    </script>
@endpush

@section('content')
    @if(!is_null($arrowCategories))
        <div class="bgMdTitle mdTitle">Arrow Crafting</div>
        <table class="bgArea2">
            <tr>
                @include('templates.misc.arrow-craft.arrows', [ "arrowCategories" => $arrowCategories ])
                <td style="width:26.6%; vertical-align:top;">
                    <div id="materialList">
                        <div class="bgSmTitle smTitle">Materials</div>
                        <table class="bgLtTable">
                            <tr>
                                <td class="bgLtRow1 padded">Click an arrow to see materials for it.</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width:26.6%; vertical-align:top;">
                    <div id="craftList">
                        <div class="bgSmTitle smTitle">Material Info</div>
                        <table class="bgLtTable">
                            <tr>
                                <td class="bgLtRow1 padded">Click a material to see info for it.</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width:26.6%; vertical-align:top;">
                    <div id="dropList">
                    </div>
                </td>
            </tr>
        </table>
    @else
        @include('templates.misc.arrow-craft.error')
    @endif
    @include('layout.footer')
@endsection