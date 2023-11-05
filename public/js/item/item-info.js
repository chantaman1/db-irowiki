function openCardIllust(curID){	
	window.open("http://db.irowiki.org/image/card/" + curID + ".png", "cardIllust", "toolbar=no, history=no, " + 
		"location=no, menubar=no, scrollbars=no, width=310, height=410, resizeable=no, status=no");
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

function setIndex(menuName, index){
	if (index) document.getElementById(menuName).selectedIndex = index;
}

function onCategoryChange(data){
	console.log(data);
	var selCategory = document.getElementById("categoryMenu").value;
	var subCategoryMenu = document.getElementById("subcatMenu");
	var filteredData = data;

	subCategoryMenu.options.length = 0;

	if(selCategory == 0 || data.length == 0){
		subCategoryMenu.disabled = true;
		subCategoryMenu.options.add(new Option("--", "0"));
	}

	if(selCategory > 0){
		subCategoryMenu.disabled = false;
		subCategoryMenu.options.add(new Option("(All)", "0", true, true));
		var filteredData = data.filter((x) => x.category == selCategory);

		for(var index in filteredData){
			subCategoryMenu.options.add(new Option(filteredData[index].name, filteredData[index].subcat));
		}
	}
}

function onSubcategoryChange(data){
	var selCategory = document.getElementById("categoryMenu").value;
	var selSubcat = document.getElementById("subcatMenu") ? document.getElementById("subcatMenu").value : 0;
	var searchText = document.getElementById("search");
	var mainMenu = document.getElementById("mainMenu");
	var filteredData = data;

	if(!data){
		return;
	}

	mainMenu.options.length = 0;

	if(!searchText){
		mainMenu.options.add(new Option(" ", ""));
	}

	if(selSubcat == 0){
		for(var index in filteredData){
			mainMenu.options.add(new Option(filteredData[index].name, filteredData[index].subcat));
		}
	}

	if(selSubcat > 0){
		var filteredData = data.filter((x) => x.category == selCategory && x.subcat == selSubcat);
		for(var index in filteredData){
			mainMenu.options.add(new Option(filteredData[index].name, filteredData[index].subcat));
		}
	}
}
