<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iW Database</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/misc.js')}}"></script>
    @stack('scripts')
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-start sm:pt-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bgLgTitle lgTitle">iW Database</div>
            <div class="tabBar">
                <ul>
                    <li>
                        <div id="siteMenuTab1" class="active" onclick="setTabSelect('siteMenu', 1);">Main</div>
                    </li>
                    <li>
                        <div id="siteMenuTab2" onclick="setTabSelect('siteMenu', 2);">Item</div>
                    </li>
                    <li>
                        <div id="siteMenuTab3" onclick="setTabSelect('siteMenu', 3);">Monster</div>
                    </li>
                    <li>
                        <div id="siteMenuTab4" onclick="setTabSelect('siteMenu', 4);">Map</div>
                    </li>
                    <li>
                        <div id="siteMenuTab5" onclick="setTabSelect('siteMenu', 5);">Misc</div>
                    </li>
                    <li>
                        <div id="siteMenuTab6" onclick="setTabSelect('siteMenu', 6);">Tool</div>
                    </li>
                </ul>
            </div>
            <div class="siteMenuBody">
                <div id="siteMenuArea1" class="siteMenuArea" style="display:block;">
                    <ul>
                        <li><a href="/db/">Home</a></li>
                        <li><a href="/db/search/">Search</a></li>
                        <li><a href="/db/settings/">Settings</a></li>
                    </ul>
                </div>
                <div id="siteMenuArea2" class="siteMenuArea">
                    <ul>
                        <li><a href="/db/item-info/" style="width:90px">Item Info</a></li>
                        <li><a href="/db/weapon-search/" style="width:110px">Weapon Search</a></li>
                        <li><a href="/db/gear-search/" style="width:110px">Gear Search</a></li>
                        <li><a href="/db/costume-search/" style="width:160px">Costume/Shadow Search</a></li>
                        <li><a href="/db/consume-search/" style="width:120px">Consumable Search</a></li>
                        <li><a href="/db/card-search/" style="width:100px">Card Search</a></li>
                    </ul>
                </div>
                <div id="siteMenuArea3" class="siteMenuArea">
                    <ul>
                        <li><a href="/db/monster-info/">Monster Info</a></li>
                        <li><a href="/db/monster-search/">Monster Search</a></li>
                        <li><a href="/db/monster-skill/">Monster Skill</a></li>
                    </ul>
                </div>
                <div id="siteMenuArea4" class="siteMenuArea">
                    <ul>
                        <li><a href="/db/map-info/">Map Info</a></li>
                        <li><a href="/db/world-map/">World Map</a></li>
                        <li><a href="/db/newworld-map/">New World Map</a></li>
                        <li><a href="/db/dungeon-map/">Dungeon Maps</a></li>
                        <li><a href="/db/instance-map/">Instance Maps</a></li>
                        <li><a href="/db/town-map/">Towns</a></li>
                    </ul>
                </div>
                <div id="siteMenuArea5" class="siteMenuArea">
                    <ul>
                        <li><a href="/db/shop-info/">Shop Info</a></li>
                        <li><a href="/db/treasure-drops/">Treasure Drops</a></li>
                        <li><a href="/db/arrow-craft/">Arrow Crafting</a></li>
                    </ul>
                </div>
                <div id="siteMenuArea6" class="siteMenuArea">
                    <ul>
                        <li><a href="/db/server-status/">Server Status</a></li>
                        <li><a href="/db/calc/">Stat Calculator</a></li>
                    </ul>
                </div>
                <div style="float:right; margin:4px 3px 3px 0px;">
                    <form onsubmit="return siteSearch();">
                        <input accesskey="f" type="text" id="menuSearch" style="width:150px;" placeholder="Quick Search" />
                        <input type="submit" value="Go" />
                    </form>
                </div>
            </div>
            <div class="pageBody">
            <!--=============================START Content================================-->
            @yield('content')
            <!--==============================END Content=================================-->
            </div>
        </div>
    </div>
</body>

</html>