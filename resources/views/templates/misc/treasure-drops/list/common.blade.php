<td class="list">
    @if (MiscHelper::isWOE_2($realm->realm))
        @include('templates.misc.treasure-drops.box-drops', [ 
            "boxDrops" => MiscHelper::BoxDrops(0, 2), 
            "boxName" => MiscHelper::BoxName(0, 2) 
        ])
    @elseif (MiscHelper::isWOE_TE($realm->realm))
        @include('templates.misc.treasure-drops.box-drops', [ 
            "boxDrops" => MiscHelper::BoxDrops(0, 3), 
            "boxName" => MiscHelper::BoxName(0, 3) 
        ])
    {{-- WOE 1 --}}
    @else
        @include('templates.misc.treasure-drops.box-drops', [ 
            "boxDrops" => MiscHelper::BoxDrops(0, 1), 
            "boxName" => MiscHelper::BoxName(0, 1) 
        ])
    @endif
</td>