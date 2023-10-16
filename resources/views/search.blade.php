@extends('layout.app')

@section('content')
<div class="bgMdTitle mdTitle">Search</div>
<table class="bgDkTable">
    <tbody>
        <tr>
            <td class="bgDkRow1 padded">
                In the Search field, an asterisk (*) can be used as a wild card and a semi-colon (;) can be used to separate multiple entries.<br>
                When searching for cards, the cards prefix/suffix can be used as well.<br>
                Browser Plug-in: <a class="medium" href="javascript:window.external.AddSearchProvider('http://db.irowiki.org/db/opensearch.xml');">(Click to Install)</a>
            </td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td style="width:45%; vertical-align:top;">
                <form onsubmit="return searchEngine();">
                    <div class="bgSmTitle smTitle">Options</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded searchOptCaption">Search</td>
                                <td class="bgLtRow1 padded searchOptArea">
                                    <input accesskey="f" type="text" style="width:240px;" id="search" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded searchOptCaption">Type</td>
                                <td class="bgLtRow2 padded searchOptArea">
                                    <input type="checkbox" id="type1" checked="1">Item<br>
                                    <input type="checkbox" id="type2" checked="1">Monster<br>
                                    <input type="checkbox" id="type3" checked="1">Map<br>
                                    <input type="checkbox" id="type4" checked="1">Shop
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="bgDkTable">
                        <tbody>
                            <tr>
                                <td class="bgDkRow5 thickPadded">
                                    <input type="submit" value="Go">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </td>
            <td style="width:55%; vertical-align:top;">
            </td>
        </tr>
    </tbody>
</table>
@include('layout.footer')
@endsection