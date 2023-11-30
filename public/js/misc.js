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

function formatNum(number){
	var numStr = number.toString();
	var numParts, numMain = "", numDec = "";
	var regEx = /(\d+)(\d{3})/;
	
	numParts = numStr.split(".");
	numMain = numParts[0];
	if (numParts.length > 1) numDec = "." + numParts[1];
	
	while (regEx.test(numMain))
		numMain = numMain.replace(regEx, "$1" + "," + "$2");
	
	return numMain + numDec;
}

function formatRate(rate, decimals){
	var rateParts, rateDec;
	
	rate = rate.toString();
	rateParts = rate.split(".");
	if (rateParts.length > 1)
		rateDec = rateParts[1];
	else
		rateDec = "";
	
	if (rateDec.length > decimals)
		rateDec = rateDec.substr(0, decimals);
	else if (rateDec.length < decimals){
		for (ctr = 1; ctr <= decimals - rateDec.length + 1; ctr++)
			rateDec = rateDec + "0";
	}
	
	return rateParts[0] + "." + rateDec;
}
