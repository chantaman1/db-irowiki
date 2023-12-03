@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/towns.css') }}" rel="stylesheet">
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
    <div class="bgMdTitle mdTitle">Towns</div>
    <table class="bgLtTable" id="town-page">
        <tr>
            <td class="bgSmTitle padded" colspan="6">Rune Midgard</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartName" >Alberta</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/alberta/">
                    <img src="https://db.irowiki.org/image/map/thumb/alberta.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartName" >Al De Baran</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/aldebaran/">
                    <img src="https://db.irowiki.org/image/map/thumb/aldebaran.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Archer Village</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/pay_arche/">
                    <img src="https://db.irowiki.org/image/map/thumb/pay_arche.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Comodo</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/comodo/">
                    <img src="https://db.irowiki.org/image/map/thumb/comodo.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Geffen</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/geffen/">
                    <img src="https://db.irowiki.org/image/map/thumb/geffen.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Izlude</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/izlude/">
                    <img src="https://db.irowiki.org/image/map/thumb/izlude.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Jawaii</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/jawaii/">
                    <img src="https://db.irowiki.org/image/map/thumb/jawaii.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Lutie</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/xmas/">
                    <img src="https://db.irowiki.org/image/map/thumb/xmas.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Morroc</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/morocc/">
                    <img src="https://db.irowiki.org/image/map/thumb/morocc.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Payon</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/payon/">
                    <img src="https://db.irowiki.org/image/map/thumb/payon.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Prontera</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/prontera/">
                    <img src="https://db.irowiki.org/image/map/thumb/prontera.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Umbala</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/umbala/">
                    <img src="https://db.irowiki.org/image/map/thumb/umbala.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">Republic of Schwartzvald</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Einbech</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/einbech/">
                    <img src="https://db.irowiki.org/image/map/thumb/einbech.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Einbroch</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/einbroch/">
                    <img src="https://db.irowiki.org/image/map/thumb/einbroch.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Hugel</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/hugel/">
                    <img src="https://db.irowiki.org/image/map/thumb/hugel.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Juno</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/yuno/">
                    <img src="https://db.irowiki.org/image/map/thumb/yuno.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Lighthalzen</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/lighthalzen/">
                    <img src="https://db.irowiki.org/image/map/thumb/lighthalzen.png" height="45%"/>
                </a>
            </td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">Arunafeltz States</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Rachel</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/rachel/">
                    <img src="https://db.irowiki.org/image/map/thumb/rachel.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Veins</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/veins/">
                    <img src="https://db.irowiki.org/image/map/thumb/veins.png" height="45%"/>
                </a>
            </td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">New World</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Rune Midgard Allied Forces Post</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mid_camp/">
                    <img src="https://db.irowiki.org/image/map/thumb/mid_camp.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >El Dicastes</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/dicastes01/">
                    <img src="https://db.irowiki.org/image/map/thumb/dicastes01.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Manuk</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/manuk/">
                    <img src="https://db.irowiki.org/image/map/thumb/manuk.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Mora</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/mora/">
                    <img src="https://db.irowiki.org/image/map/thumb/mora.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Splendide</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/splendide/">
                    <img src="https://db.irowiki.org/image/map/thumb/splendide.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Eclage</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/eclage/">
                    <img src="https://db.irowiki.org/image/map/thumb/eclage.png" height="45%"/>
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">International</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Amatsu</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/amatsu/">
                    <img src="https://db.irowiki.org/image/map/thumb/amatsu.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Ayothaya</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/ayothaya/">
                    <img src="https://db.irowiki.org/image/map/thumb/ayothaya.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Brasilis</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/brasilis/">
                    <img src="https://db.irowiki.org/image/map/thumb/brasilis.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Dewata</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/dewata/">
                    <img src="https://db.irowiki.org/image/map/thumb/dewata.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Kunlun</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/gonryun/">
                    <img src="https://db.irowiki.org/image/map/thumb/gonryun.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Louyang</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/louyang/">
                    <img src="https://db.irowiki.org/image/map/thumb/louyang.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Moscovia</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/moscovia/">
                    <img src="https://db.irowiki.org/image/map/thumb/moscovia.png" height="45%"/>
                </a>
            </td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">Niflheim</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Niflheim</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/niflheim/">
                    <img src="https://db.irowiki.org/image/map/thumb/niflheim.png" height="45%"/>
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="bgSmTitle padded" colspan="6">MISC</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded chartname" >Malangdo</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/malangdo/">
                    <img src="https://db.irowiki.org/image/map/thumb/malangdo.png" height="45%"/>
                </a>
            </td>
            <td class="bgLtRow1 padded chartname" >Verus Findspot</td>
            <td class="bgLtRow1 chartImage">
                <a href="/db/map-info/verus04/">
                    <img src="https://db.irowiki.org/image/map/thumb/verus04.png" height="45%"/>
                </a>
            </td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        </tr>
    </table>
    @include('layout.footer')
@endsection