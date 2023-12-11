function toggleMenu(e){
	for( let arrowCategory of document.getElementsByClassName('arrowList') )
        arrowCategory.style.display = "none";
	
	e.nextElementSibling.style.display = "block";
}

function arrowInfo(arrowID){
    var xmlhttp = null;
	
	if (window.XMLHttpRequest)
	  	xmlhttp = new XMLHttpRequest();
	else if (window.ActiveXObject)
	  	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	
	if (xmlhttp != null){
		xmlhttp.open("GET", `?materials=${arrowID}`, false);
		xmlhttp.send(null);
		
		if (xmlhttp.status == 200)
        {
            let data = JSON.parse(xmlhttp.responseText);
            let color = 2;
            let tr = ``;
            for (let material of data.materials){
                if (color == 1) color = 2; else color = 1;

                tr += `
                    <tr>
                        <td class="bgLtRow${color + 1} padded matImg">
                            <img src="https://db.irowiki.org/image/item/${material.item}.png\">
                        </td>
                        <td class="bgLtRow${color} padded matName">
                            <a href="javascript:materialInfo(${material.item});">${material.name}</a>
                        </td>
                        <td class="bgLtRow${color + 1} padded matAmount">x ${material.amount}</td>
                    </tr>
                `;
            }

            document.getElementById("materialList").innerHTML = `
                <div class="bgSmTitle smTitle">Materials</div>
                <div class="bgDkRow3 padded">
                    <a href="/db/item-info/${data.arrow.id}/">${data.arrow.name}</a>
                </div>
                <table class="bgLtTable">
                    ${tr}
                </table>
            `;
        }
		else{
			document.getElementById("materialList").innerHTML = `
                <div class="bgSmTitle smTitle">Materials</div>
                <table class="bgLtTable">
                    <tr>
                        <td class="bgLtRow1 padded">Problem loading page: ${xmlhttp.statusText}.</td>
                    </tr>
                </table>
            `;
        }
	}
}

function materialInfo(itemID){
    var xmlhttp = null;
	
	if (window.XMLHttpRequest)
	  	xmlhttp = new XMLHttpRequest();
	else if (window.ActiveXObject)
	  	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	
	if (xmlhttp != null){
		xmlhttp.open("GET", `?craft=${itemID}`, false);
		xmlhttp.send(null);
		
		if (xmlhttp.status == 200){
            let data = JSON.parse(xmlhttp.responseText);
            let color = 2;
            let tr = ``;
            
            for (let arrow of data.arrows){
                if (color == 1) color = 2; else color = 1;

                tr += `
                    <tr>
                        <td class="bgLtRow${color + 1} padded matImg">
                            <img src="https://db.irowiki.org/image/item/${arrow.arrow}.png">
                        </td>
                        <td class="bgLtRow${color} padded matName">
                            <a href="javascript:arrowInfo(${arrow.arrow});">${arrow.name}</a>
                        </td>
                        <td class="bgLtRow${color + 1} padded matAmount">x ${arrow.amount}</td>
                    </tr>
                `; 
            }

			document.getElementById("craftList").innerHTML = `
                <div class="bgSmTitle smTitle">Arrow Craftings</div>
                <div class="bgDkRow3 padded">
                    <a href="/db/item-info/${data.item.id}/">${data.item.name}</a>
                </div>
                <table class="bgLtTable">
                    ${tr}
                </table>
            `;
        }
		else{
			document.getElementById("craftList").innerHTML = "Problem loading page: " + xmlhttp.statusText;
			document.getElementById("craftList").innerHTML = `
                <div class="bgSmTitle smTitle">Material Info</div>
                <table class="bgLtTable">
                    <tr>
                        <td class="bgLtRow1 padded">Problem loading page: ${xmlhttp.statusText}.</td>
                    </tr>
                </table>
            `;
        }
		
		xmlhttp.open("GET", `?drops=${itemID}`, false);
		xmlhttp.send(null);
		
		if (xmlhttp.status == 200){
            let data = JSON.parse(xmlhttp.responseText);
            let color = 2;
            let tr = ``;

            for (let monster of data.monsters){
                if (color == 1) color = 2; else color = 1;

                tr += `
                    <tr>
                        <td class="bgLtRow${color} padded dropMonster">
                            <a href="/db/monster-info/${monster.id}/">${monster.name}</a>
                        </td>
                        <td class="bgLtRow${color + 1} padded dropRate ${monster.flag ? " highlight" : "" }">${monster.rate}</td>
                    </tr>
                `;
            }

			document.getElementById("dropList").innerHTML = `
                <div class="bgSmTitle smTitle">Monster Drops</div>
                <div class="bgDkRow3 padded">
                    <a href="/db/item-info/${data.item.id}/">${data.item.name}</a>
                </div>
                <table class="bgLtTable">
                    ${tr}
                </table>
            `;    
        }
		else{
			document.getElementById("dropList").innerHTML = "";
        }
	}
}