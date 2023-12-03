for(let td of document.getElementsByClassName('chartImage')){
    let anchor = td.children[0];
    let map_id = anchor.href.trim().split('/')[5];
    td.onmouseover = function() { showInfo(map_id) };
    td.onmouseout = function() { hideInfo() };
    anchor.onclick = function() { hideInfo() };
}