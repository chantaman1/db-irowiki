@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/dungeon.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script type="text/javascript">
        var mapData = {!! json_encode($mapData) !!};
    </script>
@endpush

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world2.js') }}"></script>
@endpush

@section('content')
    <div id="mapInfo" class="mapInfo"></div>
    <div class="bgMdTitle mdTitle">Dungeon Map</div>
    <table class="bgLtTable">
        <tr>
            <td class="bgLtRow1 padded chartName">Abyss Lake Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abyss_01/">
                    <img src="https://db.irowiki.org/image/map/thumb/abyss_01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abyss_02/">
                    <img src="https://db.irowiki.org/image/map/thumb/abyss_02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abyss_03/">
                    <img src="https://db.irowiki.org/image/map/thumb/abyss_03.png" />
                </a>
            </td>
            <td class="normal1 fillerRight chartDivider" colspan="4">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Labyrinth Forest</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_maze01/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_maze01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_maze02/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_maze02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_maze03/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_maze03.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Amatsu Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ama_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/ama_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ama_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/ama_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ama_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/ama_dun03.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Lighthalzen Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lhz_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/lhz_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lhz_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/lhz_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lhz_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/lhz_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Ant Hell</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/anthell01/">
                    <img src="https://db.irowiki.org/image/map/thumb/anthell01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/anthell02/">
                    <img src="https://db.irowiki.org/image/map/thumb/anthell02.png" />
                </a>
            </td>
            <td colspan="5">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Louyang Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lou_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/lou_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lou_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/lou_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lou_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/lou_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Ayothaya Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ayo_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/ayo_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ayo_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/ayo_dun02.png" />
                </a>
            </td>
            <td colspan="5">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Magma Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mag_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/mag_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mag_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/mag_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mag_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/mag_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Beach Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/beach_dun/">
                    <img src="https://db.irowiki.org/image/map/thumb/beach_dun.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/beach_dun2/">
                    <img src="https://db.irowiki.org/image/map/thumb/beach_dun2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/beach_dun3/">
                    <img src="https://db.irowiki.org/image/map/thumb/beach_dun3.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Mjolnir Dead Pit</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mjo_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/mjo_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mjo_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/mjo_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mjo_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/mjo_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Brasilis Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/bra_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/bra_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/bra_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/bra_dun02.png" />
                </a>
            </td>
            <td colspan="5">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Moscovia Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mosk_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/mosk_dun01.png" />
                </a></td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mosk_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/mosk_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mosk_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/mosk_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName" rowspan="2">Clock Tower</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/c_tower1/">
                    <img src="https://db.irowiki.org/image/map/thumb/c_tower1.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/c_tower2/">
                    <img src="https://db.irowiki.org/image/map/thumb/c_tower2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/c_tower3/">
                    <img src="https://db.irowiki.org/image/map/thumb/c_tower3.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/c_tower4/">
                    <img src="https://db.irowiki.org/image/map/thumb/c_tower4.png" />
                </a>
            </td>
            <td colspan="3">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Nameless Island</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/nameless_n/">
                    <img src="https://db.irowiki.org/image/map/thumb/nameless_n.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abbey01/">
                    <img src="https://db.irowiki.org/image/map/thumb/abbey01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abbey02/">
                    <img src="https://db.irowiki.org/image/map/thumb/abbey02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/abbey03/">
                    <img src="https://db.irowiki.org/image/map/thumb/abbey03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/alde_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/alde_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/alde_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/alde_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/alde_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/alde_dun03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/alde_dun04/">
                    <img src="https://db.irowiki.org/image/map/thumb/alde_dun04.png" />
                </a>
            </td>
            <td colspan="3">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Nidhoggur Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/nyd_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/nyd_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow2 chartImage">
                <a href="/db/map-info/nyd_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/nyd_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/1@nyd/">
                    <img src="https://db.irowiki.org/image/map/thumb/1@nyd.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/2@nyd/">
                    <img src="https://db.irowiki.org/image/map/thumb/2@nyd.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Dewata Dungeon & Volcano</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/dew_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/dew_dun02.png" />
                </a>
            </td>
            <td class=" chartImage">
                <a href="/db/map-info/dew_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/dew_dun01.png" />
                </a>
            </td>
            <td colspan="5">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Orc Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/orcsdun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/orcsdun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/orcsdun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/orcsdun02.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Einbech Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ein_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/ein_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ein_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/ein_dun02.png" />
                </a>
            </td>
            <td colspan="5">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Overlook Water Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun00t/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun00t.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun01t/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun01t.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun02t/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun02t.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun03t/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun03t.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun04t/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun04t.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Endless Tower</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/1@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/1@tower.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/2@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/2@tower.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/3@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/3@tower.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/4@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/4@tower.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/5@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/5@tower.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/6@tower/">
                    <img src="https://db.irowiki.org/image/map/thumb/6@tower.png" />
                </a>
            </td>
            <td>&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Payon Cave</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_dun00/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_dun00.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_dun03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_dun04/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_dun04.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Geffen Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gef_dun00/">
                    <img src="https://db.irowiki.org/image/map/thumb/gef_dun00.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gef_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gef_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gef_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gef_dun02.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Prontera Culvert</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_sewb1/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_sewb1.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_sewb2/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_sewb2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_sewb3/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_sewb3.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prt_sewb4/">
                    <img src="https://db.irowiki.org/image/map/thumb/prt_sewb4.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Geffenia</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gefenia01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gefenia01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gefenia02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gefenia02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gefenia03/">
                    <img src="https://db.irowiki.org/image/map/thumb/gefenia03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gefenia04/">
                    <img src="https://db.irowiki.org/image/map/thumb/gefenia04.png" />
                </a>
            </td>
            <td colspan="3">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Pyramid</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd01/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd02/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd03/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd04/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd05/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd05.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moc_pryd06/">
                    <img src="https://db.irowiki.org/image/map/thumb/moc_pryd06.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName" rowspan="3">Glast Heim</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/glast_01/">
                    <img src="https://db.irowiki.org/image/map/thumb/glast_01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_cas01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_cas01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_cas02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_cas02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_in01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_in01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_step/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_step.png" />
                </a>
            </td>
            <td colspan="2">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Robot Factory</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/kh_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/kh_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/kh_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/kh_dun02.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 chartImage">
                <a href="/db/map-info/gl_prison/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_prison.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_prison1/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_prison1.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_knt01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_knt01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_knt02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_knt02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_church/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_church.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_chyard/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_chyard.png" />
                </a>
            </td>
            <td>&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Sealed Shrine</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/1@cata/">
                    <img src="https://db.irowiki.org/image/map/thumb/1@cata.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/2@cata/">
                    <img src="https://db.irowiki.org/image/map/thumb/2@cata.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_sew01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_sew01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_sew02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_sew02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_sew03/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_sew03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_sew04/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_sew04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gl_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gl_dun02.png" />
                </a>
            </td>
            <td>&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Sphinx</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/in_sphinx1/">
                    <img src="https://db.irowiki.org/image/map/thumb/in_sphinx1.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/in_sphinx2/">
                    <img src="https://db.irowiki.org/image/map/thumb/in_sphinx2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/in_sphinx3/">
                    <img src="https://db.irowiki.org/image/map/thumb/in_sphinx3.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/in_sphinx4/">
                    <img src="https://db.irowiki.org/image/map/thumb/in_sphinx4.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/in_sphinx5/">
                    <img src="https://db.irowiki.org/image/map/thumb/in_sphinx5.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName" rowspan="3">Guild Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun04/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/schg_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/schg_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/arug_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/arug_dun01.png" />
                </a>
            </td>
            <td>&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Scaraba Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/dic_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/dic_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/dic_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/dic_dun02.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun01_2/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun01_2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun02_2/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun02_2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun03_2/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun03_2.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld_dun04_2/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld_dun04_2.png" />
                </a>
            </td>
            <td colspan="3">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Sunken Ship</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/treasure01/">
                    <img src="https://db.irowiki.org/image/map/thumb/treasure01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/treasure02/">
                    <img src="https://db.irowiki.org/image/map/thumb/treasure02.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld2_pay/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld2_pay.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld2_ald/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld2_ald.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld2_prt/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld2_prt.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gld2_gef/">
                    <img src="https://db.irowiki.org/image/map/thumb/gld2_gef.png" />
                </a>
            </td>
            <td colspan="3">&nbsp;</td>
            <td class="bgLtRow2 padded chartName" rowspan="2">Thanatos Tower</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t01/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t02/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t03/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t04/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t05/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t05.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t06/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t06.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Hazy Forest</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/1@mist/">
                    <img src="https://db.irowiki.org/image/map/thumb/1@mist.png" />
                </a>
            </td>
            <td colspan="6">&nbsp;</td>
            <td class="bgLtRow2 chartImage">
                <a href="/db/map-info/tha_t07/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t07.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t08/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t08.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t09/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t09.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t10/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t10.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t11/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t11.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tha_t12/">
                    <img src="https://db.irowiki.org/image/map/thumb/tha_t12.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Holy Ground</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ra_san01/">
                    <img src="https://db.irowiki.org/image/map/thumb/ra_san01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ra_san02/">
                    <img src="https://db.irowiki.org/image/map/thumb/ra_san02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ra_san03/">
                    <img src="https://db.irowiki.org/image/map/thumb/ra_san03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ra_san04/">
                    <img src="https://db.irowiki.org/image/map/thumb/ra_san04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ra_san05/">
                    <img src="https://db.irowiki.org/image/map/thumb/ra_san05.png" />
                </a>
            </td>
            <td colspan="2">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Thor Volcano Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/thor_v01/">
                    <img src="https://db.irowiki.org/image/map/thumb/thor_v01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/thor_v02/">
                    <img src="https://db.irowiki.org/image/map/thumb/thor_v02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/thor_v03/">
                    <img src="https://db.irowiki.org/image/map/thumb/thor_v03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Ice Cave</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ice_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/ice_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ice_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/ice_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ice_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/ice_dun03.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Toy Factory</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/xmas_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/xmas_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/xmas_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/xmas_dun02.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow2 padded chartName">Juperos Ruins</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/juperos_01/">
                    <img src="https://db.irowiki.org/image/map/thumb/juperos_01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/juperos_02/">
                    <img src="https://db.irowiki.org/image/map/thumb/juperos_02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/jupe_core/">
                    <img src="https://db.irowiki.org/image/map/thumb/jupe_core.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow1 padded chartName">Turtle Island</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tur_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/tur_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tur_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/tur_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/tur_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/tur_dun03.png" />
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName">Kunlun Dungeon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gon_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/gon_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gon_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/gon_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gon_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/gon_dun03.png" />
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
            <td class="bgLtRow2 padded chartName">Undersea Tunnel</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun00/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun00.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun01/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun01.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun02/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun02.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun03/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun03.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun04/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun04.png" />
                </a>
            </td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/iz_dun05/">
                    <img src="https://db.irowiki.org/image/map/thumb/iz_dun05.png" />
                </a>
            </td>
        </tr>
    </table>
    @include('layout.footer')
@endsection