
function add() {
    var id = document.getElementById("box").childElementCount.toString();
    document.getElementById("box").insertAdjacentHTML("beforeend", `
    <div class="word">
        <table>
            <tr> <td> Phrase:      </td> <td> <input type="text" name="`+id+`phrase"      id="`+id+`phrase"     > </td> </tr>
            <tr> <td> Translation: </td> <td> <input type="text" name="`+id+`translation" id="`+id+`translation"> </td> </tr>
            <tr> <td> Image:       </td> <td> <input type="text" name="`+id+`image"       id="`+id+`image"      > </td> </tr>
        </table>
    </div>`);
}



function get_val(id) {
    return encodeURIComponent(document.getElementById(id).value);
}

function save(base_address) {
    address = base_address+"?n="+get_val("al-title")+"&l="+get_val("lang")+"&u="+get_user();
    i = document.getElementById("box").children;
    for (x = 0; x < i.length; x ++) {
        address += "&";
        y = x.toString();
        address += y + "=[" + get_val(y+"phrase") + "," + get_val(y+"translation");
        if (get_val(y+"image") != "") {
            address += ",";
            address += get_val(y+"image");
        }
        address += "]";
    }
    alert(address);
    return address;
}

function check() {
    if (document.getElementById("al-title").value == "") {return;}
    location.assign(save("http://aceling.wz.cz/set/save.php"));
}


function edit() {
    if (document.getElementById("al-title").value == "") {return;}
    location.assign(save("http://aceling.wz.cz/set/save_edit.php"));
}


function get_user() {
    return document.getElementById("user").value;
}