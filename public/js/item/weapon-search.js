function search(){
	var name = document.getElementById("name").value;
	var effect = document.getElementById("effect").value;
	var type = document.getElementById("type").value;
	var job = document.getElementById("job").value;
	var element = document.getElementById("element").value;
	
	var upgradable = document.getElementById("upgradable").value;
	var breakable = document.getElementById("breakable").value;
	var binding = document.getElementById("binding").value;
	
	var detailed = document.getElementById("detailed").checked;
	
	var params = "";
	
	if (name != "") params = "&name=" + name;
	if (effect != "") params += "&effect=" + effect;
	
	if (type) params += "&type=" + type;
	if (job) params += "&job=" + job;
	if (upgradable) params += "&upgradable=" + upgradable;
	if (breakable) params += "&breakable=" + breakable;
	if (binding) params += "&binding=" + binding;
	
	if (detailed) params += "&detailed=" + detailed;
	
	params += conParam("atk");
	params += conParam("matk");
	params += conParam("slots");
	params += conParam("weight");
	params += conParam("weplv");
	params += conParam("reqlv");
	
	if (element) params += "&element=" + element;
	
	window.location = "?search" + params + 
		"&sort=" + document.getElementById("sort").value + "," + document.getElementById("sortDir").value;
	
	return false;
}

function optGroupValue(name){
	if (!document.getElementById(name + "1")) return "";
	
	if (document.getElementById(name + "1").checked) return 1;
	else if (document.getElementById(name + "2").checked) return 0;
	else return -1;
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

function conParam(name){
	if (!document.getElementById(name)) return "";
	
	var conVal = document.getElementById(name + "Con").value;
	var value = document.getElementById(name).value;
	var value2 = document.getElementById(name + "2").value;
	
	if (value)
		return "&" + name + "=" + conVal + "," + value + "," + value2;
	else
		return "";
}

function adjustAttrText(attr){
	var attrCon = document.getElementById(attr + "Con");
	
	if (attrCon.options[attrCon.selectedIndex].value == "6") 
		document.getElementById(attr + "Extra").style.visibility  = "visible";
	else
		document.getElementById(attr + "Extra").style.visibility  = "hidden";
}
