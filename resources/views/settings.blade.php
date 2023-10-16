@extends('layout.app')

@section('content')
<form method="post">
    <div class="bgMdTitle mdTitle">Settings</div>
    <table>
        <tbody>
            <tr>
                <td style="width:50%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">Database</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">DC Level</td>
                                <td class="bgLtRow1 padded settingsettingSecArea">
                                    <select name="dcLevel" style="width:240px;">
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                        <option value="6">Level 6</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                        <option value="10" selected="1">Level 10</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded settingSecCaption">OC Level</td>
                                <td class="bgLtRow2 padded settingSecArea">
                                    <select name="ocLevel" style="width:240px;">
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                        <option value="6">Level 6</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                        <option value="10" selected="1">Level 10</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">Info Menu Category</td>
                                <td class="bgLtRow1 padded settingSecArea">
                                    <input type="radio" name="navUseCategory" value="1" checked="1">Current Category<br>
                                    <input type="radio" name="navUseCategory" value="2">All Categories
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded settingSecCaption">Search Style</td>
                                <td class="bgLtRow2 padded settingSecArea">
                                    <input type="radio" name="searchStyle" value="1">Complete Match Only<br>
                                    <input type="radio" name="searchStyle" value="2">Match Beginning<br>
                                    <input type="radio" name="searchStyle" value="3" checked="1">Match Anywhere
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width:50%; vertical-align:top;">
                    <div class="bgSmTitle smTitle">Server</div>
                    <table class="bgLtTable">
                        <tbody>
                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">Server</td>
                                <td class="bgLtRow1 padded settingSecArea">
                                    <select name="gameServer" style="width:240px;">
                                        <option value="1" selected="1">iRO: Chaos</option>
                                        <option value="5" selected="1">iRO: Thor</option>
                                        <option value="4">Non-iRO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded settingSecCaption">VIP</td>
                                <td class="bgLtRow2 padded settingSecArea">
                                    <input type="radio" name="VIP" value="0" checked="1">Non-VIP
                                    <input type="radio" name="VIP" value="50">VIP
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">Experience Rate</td>
                                <td class="bgLtRow1 padded settingSecArea">
                                    <select name="expRate" style="width:120px;">
                                        <option value="100" selected="1">1x</option>
                                        <option value="125">1.25x</option>
                                        <option value="150">1.5x</option>
                                        <option value="175">1.75x</option>
                                        <option value="200">2x</option>
                                        <option value="225">2.25x</option>
                                        <option value="250">2.5x</option>
                                        <option value="275">2.75x</option>
                                        <option value="300">3x</option>
                                        <option value="5000">50x</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded settingSecCaption">Drop Rate</td>
                                <td class="bgLtRow2 padded settingSecArea">
                                    <select name="dropRate" style="width:120px;">
                                        <option value="100" selected="1">1x</option>
                                        <option value="125">1.25x</option>
                                        <option value="150">1.5x</option>
                                        <option value="175">1.75x</option>
                                        <option value="200">2x</option>
                                        <option value="225">2.25x</option>
                                        <option value="250">2.5x</option>
                                        <option value="275">2.75x</option>
                                        <option value="300">3x</option>
                                        <option value="5000">50x</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">Battle Manual</td>
                                <td class="bgLtRow1 padded settingSecArea">
                                    <select name="boostManual" style="width:120px;">
                                        <option value="">(None)</option>
                                        <option value="150">Normal</option>
                                        <option value="200">High Efficency</option>
                                        <option value="300">Battle Manual X3</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td class="bgLtRow4 padded settingSecCaption">Job Manual</td>
                                <td class="bgLtRow2 padded settingSecArea">
                                    <input type="checkbox" name="boostJob" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td class="bgLtRow3 padded settingSecCaption">Bubble Gum</td>
                                <td class="bgLtRow1 padded settingSecArea">
                                    <select name="boostGum" style="width:120px;">
                                        <option value="">(None)</option>
                                        <option value="200">Normal</option>
                                        <option value="300">High Efficency</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="bgDkTable">
        <tbody>
            <tr>
                <td class="bgDkRow5 thickPadded">
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </tbody>
    </table>
</form>
@include('layout.footer')
@endsection