<div class="bgMdTitle mdTitle">Monster Skill Details</div>
<table class="bgDkRow2">
    <tbody>
        <tr>
            <td class="padded nowrap" style="width:70%;">
                <form class="blockNormal" onsubmit="return changePage();">
                    <select id="categoryMenu" style="width:150px;"">
                        <option value="0">(All)</option>
                        @if (!is_null($menuCategories))
                            @foreach ($menuCategories as $category)
                                <option value="{{ $category->category }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <select id="mainMenu" style="width:300px;">
                        <option value="0"> </option>
                        @if (!is_null($menuMonsters))
                            @foreach ($menuMonsters as $monster)
                                <option value="{{ $monster->id }}">{{ $monster->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <input type="submit" value="Go">
                    &nbsp;
                    Search: <input type="text" id="search" style="width:150px;" onkeyup="javascript:searchBox(event);">
                </form>
            </td>
            <td style="width:30%; text-align:right; font-size:11pt;">
                <a href="/db/settings/">Settings</a>&nbsp;
            </td>
        </tr>
    </tbody>
</table>