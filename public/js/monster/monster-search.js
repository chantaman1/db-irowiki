function process(){
	var name = document.getElementById("name").value;
	var map = document.getElementById("map").value;
	var skill = document.getElementById("skill").value;
	
	var looter = optGroupValue("looter");
	var assist = optGroupValue("assist");
	var aggro = optGroupValue("aggro");
	var hyper = optGroupValue("hyper");
	var ctarget = optGroupValue("ctarget");
	var csensor = optGroupValue("csensor");
	var mobile = optGroupValue("mobile");
	var plant = optGroupValue("plant");
	var boss = optGroupValue("boss");
	
	var category = chkGroupValue("category", 6);
	
	var size = chkGroupValue("size", 3);
	var race = chkGroupValue("race", 10);
	var eleType = chkGroupValue("eleType", 10);
	var eleLvl = chkGroupValue("eleLvl", 4);
	
	var params = "";
	
	if (name != "") params = "&name=" + name;
	if (map != "") params += "&map=" + map;
	if (skill != "") params += "&skill=" + skill;
	
	if (looter >= 0) params += "&looter=" + looter;
	if (assist >= 0) params += "&assist=" + assist;
	if (aggro >= 0) params += "&aggro=" + aggro;
	if (hyper >= 0) params += "&hyper=" + hyper;
	if (ctarget >= 0) params += "&ctarget=" + ctarget;
	if (csensor >= 0) params += "&csensor=" + csensor;
	if (mobile >= 0) params += "&mobile=" + mobile;
	if (plant >= 0) params += "&plant=" + plant;
	if (boss >= 0) params += "&boss=" + boss;
	
	if (category > 0) params += "&category=" + category;
	
	params += conParam("hp");
	params += conParam("level");
	params += conParam("attack");
	params += conParam("def");
	params += conParam("mdef");
	params += conParam("bexp");
	params += conParam("jexp");
	params += conParam("flee");
	params += conParam("hit");
	params += conParam("crit");
	params += conParam("defrate");
	params += conParam("agi");
	params += conParam("vit");
	params += conParam("int");
	params += conParam("dex");
	params += conParam("luk");
	
	if (size > 0) params += "&size=" + size;
	if (race > 0) params += "&race=" + race;
	if (eleType > 0) params += "&eletype=" + eleType;
	if(eleLvl > 0) params += "&elelvl=" + eleLvl;
	
	window.location = "?search" + params + 
		"&ltype=" + document.getElementById("listType").value + 
		"&sort=" + document.getElementById("sort").value + "," + document.getElementById("sortDir").value + 
		"&header=" + document.getElementById("header").value;
	
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
