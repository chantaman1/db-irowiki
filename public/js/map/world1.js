for(let area of document.getElementsByTagName('area')){
    let map_id = area.href.trim().split('/')[5];
    area.onmouseover = function() { showInfo(map_id) };
    area.onmouseout = function() { hideInfo() };
    area.onclick = function() { hideInfo() };
}