<td class="list">
    @include('templates.misc.treasure-drops.box-drops', [ 
        "boxDrops" => MiscHelper::BoxDrops($realm->realm, 5), 
        "boxName" => MiscHelper::BoxName($realm->realm, 5) 
    ])
</td>