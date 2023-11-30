function pageInit(){
	searchText = document.getElementById("search").value;
}

function changePage(){
	var monster = document.getElementById("mainMenu").value;
	
	if (monster) window.location = "/db/monster-skill/" + monster + "/";
}