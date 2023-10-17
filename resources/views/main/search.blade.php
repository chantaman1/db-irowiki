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
                                    <input accesskey="f" type="text" style="width:240px;" id="search" value={{ $search }}>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded searchOptCaption">Type</td>
                                <td class="bgLtRow2 padded searchOptArea">
                                    <input type="checkbox" id="type1" {{ SearchHelper::checkboxState($type, 1) ? 'checked' : '' }} >Item<br>
                                    <input type="checkbox" id="type2" {{ SearchHelper::checkboxState($type, 2) ? 'checked' : '' }} >Monster<br>
                                    <input type="checkbox" id="type3" {{ SearchHelper::checkboxState($type, 3) ? 'checked' : '' }} >Map<br>
                                    <input type="checkbox" id="type4" {{ SearchHelper::checkboxState($type, 4) ? 'checked' : '' }} >Shop
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
                @if ($data != null && count($data) == 0)
                    <div class="bgSmTitle smTitle">Results</div>
                        <table class="bgDkRow3">
                            <tbody>
                                <tr>
                                    <td>&nbsp;No results found</td>
                                </tr>
                            </tbody>
                        </table>
                @elseif ($data != null && $categories !== null && count($data) > 0 && count($categories) > 0)
                    <div class="bgSmTitle smTitle">Results</div>
                        <table class="bgDkRow3">
                            <tbody>
                                <tr>
                                    <td>&nbsp;{{ count($data) }} results found</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="bgLtTable">
                            <tbody>
                                <tr>

                                    <td class="bgHeader1 padded nowrap" style="width:50%;">Name</td>
                                    <td class="bgHeader2 padded nowrap" style="width:50%;">Type</td>
                                </tr>
                                @foreach ($data as $result)
                                    <tr>
                                        <td class="bgLtRow1 padded"><a href={{ SearchHelper::resultUrl($result->type, $result->id) }}>{{ $result->name }}</a></td>
                                        <td class="bgLtRow2 padded">{{ SearchHelper::resultCatName($result->type, $result->category, $result->subcat, $categories) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                @else
                @endif
            </td>
        </tr>
    </tbody>
</table>
@include('layout.footer')
@endsection