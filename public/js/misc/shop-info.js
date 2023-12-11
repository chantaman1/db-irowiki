// Just an attempt to make the shop-info page more dynamic 
// Partially works. Only the selections are not saved.
// Probably need to use localstorage to save old selection. 
// Or maybe a totally different approach.
// Anyways I'm giving up this js thingy *_*

let mainMenu = document.querySelector('#mainMenu');
let clonedMainMenu = Array.from(mainMenu.children);

function changeShopPage(){
	var shop = document.getElementById("mainMenu").value;

	if (shop) window.location = "/db/shop-info/" + shop + "/";
	
	return false;
}

function onMapCategoryChange(){
	let categoryMenu = document.querySelector('#categoryMenu');
	
	mainMenu.innerHTML = '';
	
	if(categoryMenu.value == 'All'){
		for (let option of clonedMainMenu) {
			mainMenu.appendChild(option);
		}
	}
	else{
		for (let option of clonedMainMenu) {
			let opt = null;
			if (option.dataset.category == categoryMenu.value) {
				opt = mainMenu.appendChild(option);
				if (option.text.includes(' - '))
					opt.text = option.text.split(' - ')[1];
			}
		}
	}
	
	mainMenu.selectedIndex = 0;
};