<td class="list">
    @include('templates.misc.treasure-drops.box-drops', [ 
        "boxDrops" => MiscHelper::BoxDrops($realm->realm, 1), 
        "boxName" => MiscHelper::BoxName($realm->realm, 1) 
    ])
</td>