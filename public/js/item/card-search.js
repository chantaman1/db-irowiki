
function search(){
	var name = document.getElementById("name").value;
	var effect = document.getElementById("effect").value;
	var type = document.getElementById("type").value;
	var adjective = document.getElementById("adjective").value;
	
	var params = "";
	
	if (name != "") params += "&name=" + name;
	if (effect != "") params += "&effect=" + effect;
	if (adjective != "") params += "&adjective=" + adjective;

	params += "&type=" + type;
	
	window.location = "?search" + params + 
		"&sort=" + document.getElementById("sort").value + "," + document.getElementById("sortDir").value;
	
	return false; 
}
