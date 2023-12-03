var mapInfo = document.getElementById('mapInfo');
var infoShown = false;

document.onmousemove = function() { onMouseMove() };

function onMouseMove(event){
	var posX = 0, posY = 0, diffX = 0, diffY = 0;
	let temp = {};
	
	if (!infoShown) return;

	if (!event){
		if (!window.event) return;
		event = window.event;
	}
	posX = event.clientX;
	posY = event.clientY;
	
	if (window.innerWidth){
		posX += window.pageXOffset + 20;
		diffX = posX + mapInfo.offsetWidth - (window.innerWidth + window.pageXOffset) + 20;
	}
	else if (document.body){
		posX += document.body.scrollLeft + 20;
		diffX = posX + mapInfo.offsetWidth - (document.body.scrollLeft + document.body.clientWidth) + 1
	}
	
	if (window.innerHeight){
		posY += window.pageYOffset - 5;
		diffY = posY + mapInfo.offsetHeight - (window.innerHeight + window.pageYOffset) + 1;
	}
	else if (document.body){
		posY += document.body.scrollTop;
		diffY = posY + mapInfo.offsetHeight - (document.body.scrollTop + document.body.clientHeight) + 1;
	}
	
	if (diffX > 0)
		mapInfo.style.left = posX - mapInfo.offsetWidth - 35 + "px";
	else
		mapInfo.style.left = posX + "px";
	
	if(diffY > 0)
		mapInfo.style.top = posY - diffY + "px";
	else
		mapInfo.style.top = posY + "px";

	mapInfo.style.visibility = "visible";

	console.log(temp);
}

function mapIndex(map){
	if (!map) return -1;
	
	for (index in mapData){
		if (mapData[index].id == map)
			return index;
	}
	
	return -1;
}

function showInfo(map_id){
    var index, amount;

    if(!mapInfo) return console.log('mapInfo not found');

    index = mapIndex(map_id);

    if(index == -1) return console.log('map not found');

    var code = `
        <div id='infoMapName' class='bgSmTitle smTitle-centered nowrap'>
            ${mapData[index].name}
        </div>
    `;

    if(mapData[index].subname)
        code += `
            <div id='infoMapName' class='bgDkRow4 infoSubname'>
		        ${mapData[index].subname} 
            </div>
        `;

    var tr = ``;
    if (mapData[index].spawn.length){
        var color = 0;
        for (let monster of mapData[index].spawn){
			if (color == 1) color = 2; else color = 1;
			if (monster.name != ""){
				if (monster.amount >= 1)
					amount = monster.amount;
				else if (monster.amount == 0)
					amount = "--";
				else
					amount = "??";
				
				tr += `
                    <tr>
                        <td class='bgLtRow${color} padded nowrap infoName'>
                            ${monster.name}
                        </td>
                        <td class='bgLtRow${color+1} padded infoAmount'>
                            ${amount}
                        </td>
                    </tr>
                `;
			}
			else
				tr += `
                    <tr>
                        <td class='bgLtRow1 padded'>
                            (Too many spawns)
                        </td>
                    </tr>
                `;
		}
    }

    mapInfo.style.width = 250 + "px";
    mapInfo.innerHTML = `
        ${code}
        <table class='bgLtTable'>
            <tbody>
                ${tr}
            </tbody>
        </table>
    `;

    infoShown = true;
	onMouseMove();
}

function hideInfo() {
	if (!mapInfo) return console.log('mapInfo not found');
	
	mapInfo.style.visibility = 'hidden';
	infoShown = false;
}