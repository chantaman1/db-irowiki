function setTabSelect(name, selTab){
	var entry, className;
	
	for (entry = 1; document.getElementById(name + "Tab" + entry); entry++){
		document.getElementById(name + "Tab" + entry).className = "";
		document.getElementById(name + "Area" + entry).style.display = "none";
	}
	
	document.getElementById(name + "Tab" + selTab).className = "active";
	document.getElementById(name + "Area" + selTab).style.display = "block";
}

function siteSearch(){
	var search = document.getElementById("menuSearch").value;
	
	if (search != "" && search != "Quick Search")
		window.location = "/db/search/?quick=" + search;
	
	return false;
}

function searchEngine(){
	var search, type;
	
	search = document.getElementById("search").value;
	type = chkGroupValue("type", 4);
	
	if (!search){
		alert("Please enter a search term.");
		return false;
	}
	if (!type) type = 15;
	
	window.location = "?search=" + search + (type != 15 ? "&type=" + type : "");
	
	return false;
}

function chkGroupValue(name, count){
	var value = 0;
	
	if (!document.getElementById(name + "1")) return "";
	
	for (ctr = 1; ctr <= count; ctr++){
		if (document.getElementById(name + ctr).checked)
			value += Math.pow(2, ctr - 1);
	}
	
	return value;
}
