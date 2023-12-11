function changePage(){
	var realm = document.getElementById("menu").value;
	if (realm) window.location = "/db/treasure-drops/" + realm + "/";
}