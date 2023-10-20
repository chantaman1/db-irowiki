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

function openCardIllust(curID){	
	window.open("http://db.irowiki.org/image/card/" + curID + ".png", "cardIllust", "toolbar=no, history=no, " + 
		"location=no, menubar=no, scrollbars=no, width=310, height=410, resizeable=no, status=no");
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

function changeItemPage(){
	var item = document.getElementById("mainMenu").value;
	
	if (item) window.location = "/db/item-info/" + item + "/";
	
	return false;
}

function subcatCount(category, subcategories){
	var count = 0;
	
	for (index in subcategories){
		if (subcategories[index].category == category){
			if (subcategories[index].subcat > 0) count++;
		}
	}
	
	return count;
}

function listSubCatMenu(subcategories){
	var subcatMenu = document.getElementById("subcatMenu");
	var selCategory = document.getElementById("categoryMenu").value;
	var curCategory = 0, curSubcat = 0;
	
	subcatMenu.options.length = 0;
	
	if (selCategory == 0 || subcatCount(selCategory, subcategories) == 0){
		subcatMenu.disabled = true;
		subcatMenu.options.add(new Option("--", "0"));
	}
	else{
		subcatMenu.disabled = false;
		subcatMenu.options.add(new Option("(All)", "0", true, true));
		
		for (index in subcategories){
			if (subcategories[index].category == selCategory && subcategories[index].subcat != 0){
				if (subcategories[index].category == curCategory && (subcategories[index].subcat == curSubcat))
					window.setTimeout("setIndex('subcatMenu', " + subcatMenu.options.length + ")", 50);
				
				subcatMenu.options.add(new Option(subcategories[index].name, subcategories[index].subcat));
			}
		}
		
	}
}

function listMainMenu(){
	var mainMenu = document.getElementById("mainMenu");
	var selCategory = document.getElementById("categoryMenu").value;
	var selSubcat = (document.getElementById("subcatMenu") ? 
		document.getElementById("subcatMenu").value : 0);
	var dataList = new Array(), name = "";
	
	mainMenu.options.length = 0;
	
	if (!searchText) mainMenu.options.add(new Option(" ", ""));
	
	for (index in menuData){
		if ((selCategory == 0 || menuData[index].category == selCategory) && (selSubcat == 0 || 
			menuData[index].subcat == selSubcat)){
			
			if ((searchBoxMatch(menuData[index].name) != -1) || (searchBoxMatch(menuData[index].subname) != -1)){
				dataList.push(menuData[index]);
			}
		}
	}
	
	if (dataList.length < 1) return;
	
	if (dataList[0].extName && selCategory == 0)
		dataList.sort(function(a, b){return (a.extName < b.extName) ? -1 : ((a.extName > b.extName) ? 1 : 0)});
	else
		dataList.sort(function(a, b){return (a.name < b.name) ? -1 : ((a.name > b.name) ? 1 : 0)});
	
	for (index in dataList){
		if ((dataList[index].visible == 1) || (dataList[index].id == curID)){
			if (dataList[index].id == curID)
				window.setTimeout("setIndex('mainMenu', " + mainMenu.options.length + ")", 50);
			
			if (dataList[index].extName && selCategory == 0)
				name = dataList[index].extName;
			else
				name = dataList[index].name;
			
			mainMenu.options.add(new Option(name, dataList[index].id));
		}
	}
}
