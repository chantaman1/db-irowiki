function changeMapPage(){
	var map = document.getElementById("mainMenu").value;
	
	if (map) window.location = "/db/map-info/" + map + "/";
	
	return false;
}

function onMapCategoryChange(){
    var mapCategory = document.getElementById("categoryMenu").value;
    var mainMenu = document.getElementById("mainMenu");
    // console.log(maps);
    // if (mapCategory > 0){
    //     for(var map in maps){
    //         if (map.category == mapCategory)
    //             mainMenu.options.add(new Option(maps[map].name, maps[map].id));
    //     }
    // }
}