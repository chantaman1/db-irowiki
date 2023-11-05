@if(!is_null($monsters))
    @foreach($monsters as $monster)
        @include('templates.map.info.spawn.monster', [ 
                "rowSpan" => $monster['rowSpan'],
                "ai" => $monster['ai'],
                "id" => $monster['id'],
                "name" => $monster['name'], 
                "amount" => $monster['amount'],
                "respawn" => $monster['respawn'],
                "expBase" => $monster['expBase'],
                "expJob" => $monster['expJob'],
                "flee" => $monster['flee'],
                "hit" => $monster['hit'],
                "level" => $monster['level'],
                "hp" => $monster['hp'],
                "eleType" => $monster['eleType'],
                "race" => $monster['race'],
                "size" => $monster['size'],
                "def" => $monster['def'],
                "mdef" => $monster['mdef'],
                "extraMonsterInfo" => $monster['extraMonsterInfo']
            ])
    @endforeach
@endif