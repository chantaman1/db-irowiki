@extends('layout.app')

@section('styles')
    <link type="text/css" href="{{ asset('/css/map/world.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script type="text/javascript">
        var mapData = {!! json_encode($mapData) !!};
    </script>
@endpush

@push('bottom-scripts')
    <script type="text/javascript" src="{{ asset('/js/map/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/map/world1.js') }}"></script>
@endpush

@section('content')
    <div id="mapInfo" class="mapInfo"></div>
    <div class="bgMdTitle mdTitle">World Map</div>
    <table class="bgDkRow3">
        <tr>
            <td style="text-align:center;">
                <img src="https://db.irowiki.org/image/map/world.jpg" usemap="#map">
            </td>
        </tr>
    </table>

    <!---Coords are top left and bottom right x1, y1, x2, y2--->
    <map name="map">
        <area shape="rect" coords="505,80,553,129" href="/db/map-info/yuno/">
        <area shape="rect" coords="654,212,707,266" href="/db/map-info/yuno_fild01/">
        <area shape="rect" coords="599,105,653,157" href="/db/map-info/yuno_fild02/">
        <area shape="poly" coords="554,105,598,105,598,157,546,157,546,130,554,130" href="/db/map-info/yuno_fild03/">
        <area shape="poly" coords="492,105,503,105,503,130,544,130,544,156,492,156" href="/db/map-info/yuno_fild04/">
        <area shape="poly" coords="546,52,598,52,598,104,554,104,554,79,546,79" href="/db/map-info/yuno_fild06/">
        <area shape="rect" coords="546,158,599,211" href="/db/map-info/yuno_fild07/">
        <area shape="rect" coords="600,158,653,211" href="/db/map-info/yuno_fild08/">
        <area shape="rect" coords="654,158,707,211" href="/db/map-info/yuno_fild09/">
        <area shape="rect" coords="546,212,599,266" href="/db/map-info/yuno_fild11/">
        <area shape="rect" coords="600,212,653,266" href="/db/map-info/yuno_fild12/">
        
        <area shape="rect" coords="382,212,436,266" href="/db/map-info/einbroch/">
        <area shape="rect" coords="437,223,491,266" href="/db/map-info/einbech/">
        <area shape="rect" coords="437,51,490,104" href="/db/map-info/ein_fild01/">
        <area shape="rect" coords="329,158,381,211" href="/db/map-info/ein_fild03/">
        <area shape="rect" coords="382,158,436,211" href="/db/map-info/ein_fild04/">
        <area shape="rect" coords="437,158,491,211" href="/db/map-info/ein_fild05/">
        <area shape="rect" coords="492,158,545,211" href="/db/map-info/ein_fild06/">
        <area shape="rect" coords="492,212,545,266" href="/db/map-info/ein_fild07/">
        <area shape="rect" coords="382,267,436,320" href="/db/map-info/ein_fild08/">
        <area shape="rect" coords="437,267,491,320" href="/db/map-info/ein_fild09/">
        
        <area shape="rect" coords="276,267,328,314" href="/db/map-info/lighthalzen/">
        <area shape="rect" coords="276,212,328,266" href="/db/map-info/lhz_fild01/">
        <area shape="rect" coords="329,212,381,266" href="/db/map-info/lhz_fild02/">
        <area shape="rect" coords="329,267,381,320" href="/db/map-info/lhz_fild03/">
        
        <area shape="rect" coords="707,1,760,51" href="/db/map-info/hugel/">
        <area shape="rect" coords="546,1,598,51" href="/db/map-info/hu_fild01/">
        <area shape="rect" coords="599,1,653,51" href="/db/map-info/hu_fild02/">
        <area shape="rect" coords="599,52,653,104" href="/db/map-info/hu_fild04/">
        <area shape="rect" coords="654,52,707,104" href="/db/map-info/hu_fild05/">
        <area shape="rect" coords="708,52,760,104" href="/db/map-info/hu_fild06/">
        <area shape="rect" coords="815,156,866,207" href="/db/map-info/odin_tem01/">
        <area shape="rect" coords="867,156,918,207" href="/db/map-info/odin_tem02/">
        <area shape="rect" coords="867,104,918,155" href="/db/map-info/odin_tem03/">
        
        <area shape="rect" coords="115,267,168,320" href="/db/map-info/rachel/">
        <area shape="rect" coords="126,239,157,266" href="/db/map-info/ra_temple/">
        <area shape="rect" coords="169,104,222,157" href="/db/map-info/ra_fild01/">
        <area shape="rect" coords="115,158,168,211" href="/db/map-info/ra_fild03/">
        <area shape="rect" coords="169,158,222,211" href="/db/map-info/ra_fild04/">
        <area shape="rect" coords="223,158,275,211" href="/db/map-info/ra_fild05/">
        <area shape="rect" coords="276,158,328,211" href="/db/map-info/ra_fild06/">
        <area shape="rect" coords="169,212,222,266" href="/db/map-info/ra_fild08/">
        <area shape="rect" coords="169,267,222,320" href="/db/map-info/ra_fild12/">
        
        <area shape="rect" coords="43,483,98,535" href="/db/map-info/veins/">
        <area shape="rect" coords="61,321,114,374" href="/db/map-info/ve_fild01/">
        <area shape="rect" coords="115,321,168,374" href="/db/map-info/ve_fild02/">
        <area shape="rect" coords="6,375,60,427" href="/db/map-info/ve_fild03/">
        <area shape="rect" coords="61,375,114,427" href="/db/map-info/ve_fild04/">
        <area shape="rect" coords="43,536,98,590" href="/db/map-info/ve_fild07/">
        
        <area shape="rect" coords="653,269,702,317" href="/db/map-info/aldebaran/">
        <area shape="rect" coords="599,269,648,317" href="/db/map-info/alde_gld/">
        <area shape="rect" coords="434,373,488,427" href="/db/map-info/mjolnir_01/">
        <area shape="rect" coords="489,373,542,427" href="/db/map-info/mjolnir_02/">
        <area shape="rect" coords="543,373,596,427" href="/db/map-info/mjolnir_03/">
        <area shape="rect" coords="597,373,650,427" href="/db/map-info/mjolnir_04/">
        <area shape="rect" coords="651,373,703,427" href="/db/map-info/mjolnir_05/">
        <area shape="rect" coords="489,428,542,480" href="/db/map-info/mjolnir_06/">
        <area shape="rect" coords="543,428,596,480" href="/db/map-info/mjolnir_07/">
        <area shape="rect" coords="597,428,650,480" href="/db/map-info/mjolnir_08/">
        <area shape="rect" coords="597,481,650,537" href="/db/map-info/mjolnir_09/">
        <area shape="rect" coords="651,428,703,480" href="/db/map-info/mjolnir_10/">
        <area shape="rect" coords="704,428,758,480" href="/db/map-info/mjolnir_11/">
        <area shape="rect" coords="651,320,703,371" href="/db/map-info/mjolnir_12/">
        
        <area shape="rect" coords="437,484,485,532" href="/db/map-info/geffen/">
        <area shape="rect" coords="279,428,331,480" href="/db/map-info/glast_01/">
        <area shape="rect" coords="489,481,542,537" href="/db/map-info/gef_fild00/">
        <area shape="rect" coords="489,538,542,590" href="/db/map-info/gef_fild01/">
        <area shape="rect" coords="543,591,596,643" href="/db/map-info/gef_fild02/">
        <area shape="rect" coords="489,591,542,643" href="/db/map-info/gef_fild03/">
        <area shape="rect" coords="434,428,488,480" href="/db/map-info/gef_fild04/">
        <area shape="rect" coords="381,428,433,480" href="/db/map-info/gef_fild05/">
        <area shape="rect" coords="332,428,380,480" href="/db/map-info/gef_fild06/">
        <area shape="rect" coords="381,481,433,537" href="/db/map-info/gef_fild07/">
        <area shape="rect" coords="327,481,380,537" href="/db/map-info/gef_fild08/">
        <area shape="rect" coords="434,538,488,590" href="/db/map-info/gef_fild09/">
        <area shape="rect" coords="434,591,488,643" href="/db/map-info/gef_fild10/">
        <area shape="rect" coords="434,644,488,696" href="/db/map-info/gef_fild11/">
        <area shape="rect" coords="381,538,433,590" href="/db/map-info/gef_fild13/">
        
        <area shape="rect" coords="656,538,699,590" href="/db/map-info/prontera/">
        <area shape="rect" coords="812,481,855,519" href="/db/map-info/prt_monk/">
        <area shape="rect" coords="706,586,735,619" href="/db/map-info/izlude/">
        <area shape="rect" coords="761,572,782,593" href="/db/map-info/izlu2dun/">
        <area shape="rect" coords="543,481,596,537" href="/db/map-info/prt_fild00/">
        <area shape="rect" coords="651,481,703,537" href="/db/map-info/prt_fild01/">
        <area shape="rect" coords="704,481,758,533" href="/db/map-info/prt_fild02/">
        <area shape="rect" coords="759,481,811,519" href="/db/map-info/prt_fild03/">
        <area shape="rect" coords="543,538,596,590" href="/db/map-info/prt_fild04/">
        <area shape="rect" coords="597,538,650,590" href="/db/map-info/prt_fild05/">
        <area shape="rect" coords="704,541,758,585" href="/db/map-info/prt_fild06/">
        <area shape="rect" coords="597,591,650,643" href="/db/map-info/prt_fild07/">
        <area shape="rect" coords="651,591,704,643" href="/db/map-info/prt_fild08/">
        <area shape="rect" coords="597,644,650,696" href="/db/map-info/prt_fild09/">
        <area shape="rect" coords="543,644,596,696" href="/db/map-info/prt_fild10/">
        <area shape="rect" coords="489,644,542,696" href="/db/map-info/prt_fild11/">
        
        <area shape="rect" coords="788,682,835,735" href="/db/map-info/payon/">
        <area shape="rect" coords="808,635,848,681" href="/db/map-info/pay_arche/">
        <area shape="poly" coords="737,735,787,735,787,682,762,682,737,695" href="/db/map-info/pay_gld/">
        <area shape="rect" coords="877,834,923,882" href="/db/map-info/alberta/">
        <area shape="rect" coords="924,841,946,865" href="/db/map-info/alb2trea/">
        <area shape="rect" coords="933,893,957,921" href="/db/map-info/tur_dun01/">
        <area shape="rect" coords="951,889,976,919" href="/db/map-info/tur_dun01/">
        <area shape="rect" coords="761,736,815,789" href="/db/map-info/pay_fild01/">
        <area shape="rect" coords="785,790,824,850" href="/db/map-info/pay_fild02/">
        <area shape="rect" coords="825,814,876,853" href="/db/map-info/pay_fild03/">
        <area shape="poly" coords="763,681,763,629,705,629,705,695,736,695" href="/db/map-info/pay_fild04/">
        <area shape="rect" coords="825,854,876,906" href="/db/map-info/pay_fild06/">
        <area shape="rect" coords="816,736,868,789" href="/db/map-info/pay_fild07/">
        <area shape="rect" coords="836,682,868,735" href="/db/map-info/pay_fild08/">
        <area shape="rect" coords="869,682,922,735" href="/db/map-info/pay_fild09/">
        <area shape="rect" coords="869,736,922,789" href="/db/map-info/pay_fild10/">
        
        <area shape="rect" coords="462,772,507,816" href="/db/map-info/morocc/">
        <area shape="rect" coords="420,750,452,779" href="/db/map-info/moc_ruins/">
        <area shape="rect" coords="651,644,704,696" href="/db/map-info/moc_fild01/">
        <area shape="rect" coords="680,697,731,742" href="/db/map-info/moc_fild02/">
        <area shape="rect" coords="714,743,760,795" href="/db/map-info/moc_fild03/">
        <area shape="rect" coords="458,719,510,770" href="/db/map-info/moc_fild07/">
        <area shape="rect" coords="508,817,561,869" href="/db/map-info/moc_fild11/">
        <area shape="rect" coords="459,817,507,869" href="/db/map-info/moc_fild12/">
        <area shape="rect" coords="669,743,713,802" href="/db/map-info/moc_fild13/">
        <area shape="rect" coords="562,859,616,913" href="/db/map-info/moc_fild16/">
        <area shape="rect" coords="508,870,561,922" href="/db/map-info/moc_fild17/">
        <area shape="rect" coords="455,870,507,922" href="/db/map-info/moc_fild18/">
        <area shape="rect" coords="420,780,452,811" href="/db/map-info/moc_fild19/">
        <area shape="rect" coords="538,746,586,794" href="/db/map-info/moc_fild20/">
        <area shape="rect" coords="596,716,644,764" href="/db/map-info/moc_fild21/">
        <area shape="rect" coords="596,774,644,822" href="/db/map-info/moc_fild22/">
        
        <area shape="rect" coords="241,763,293,816" href="/db/map-info/cmd_fild01/">
        <area shape="rect" coords="241,817,293,869" href="/db/map-info/cmd_fild02/">
        <area shape="rect" coords="294,763,346,816" href="/db/map-info/cmd_fild03/">
        <area shape="rect" coords="294,817,346,869" href="/db/map-info/cmd_fild04/">
        <area shape="rect" coords="347,817,400,869" href="/db/map-info/cmd_fild06/">
        <area shape="rect" coords="347,870,400,922" href="/db/map-info/cmd_fild07/">
        <area shape="rect" coords="401,817,454,869" href="/db/map-info/cmd_fild08/">
        <area shape="rect" coords="401,870,454,922" href="/db/map-info/cmd_fild09/">
        
        <area shape="rect" coords="190,603,233,654" href="/db/map-info/umbala/">
        <area shape="rect" coords="126,709,181,762" href="/db/map-info/um_fild01/">
        <area shape="rect" coords="182,709,234,762" href="/db/map-info/um_fild02/">
        <area shape="rect" coords="235,709,287,762" href="/db/map-info/um_fild03/">
        <area shape="rect" coords="182,655,234,708" href="/db/map-info/um_fild04/">
    </map>
    @include('layout.footer')
@endsection