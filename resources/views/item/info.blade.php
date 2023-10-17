@extends('layout.app')

@section('content')
<div class="bgMdTitle mdTitle">Item Info</div>
<table class="bgDkRow2">
    <tr>
        <td class="padded nowrap" style="width:70%;">
            <form class="blockNormal" onsubmit="return changeItemPage();">
                <select id="categoryMenu" style="width:120px;" onchange="listSubCatMenu( {{ $subMenuCats }} );">
                @if ($menuCats != null)
                    <option value="0">(All)</option>
                    @foreach ($menuCats as $menuItem)
                        <option @selected($menuItem->category == 1) value="{{ $menuItem->category }}">{{ $menuItem->name }}</option>
                    @endforeach
                @endif
                </select>
                <select id="subcatMenu" style="width:120px;" onchange="listMainMenu();">
                </select>
                <select id="mainMenu" style="width:260px;"></select>
                <input type="submit" value="Go">
                &nbsp;
                Search: <input type="text" id="search" style="width:150px;" onkeyup="searchBox(event);" />
            </form>
        </td>
        <td style="width:30%; text-align:right; font-size:11pt;">
            <a href="/db/settings/">Settings</a>&nbsp;
        </td>
    </tr>
</table>
@include('layout.footer')
@endsection