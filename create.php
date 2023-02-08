<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        Vyber základní jazyk:
        <select>
            <option>Čeština</option>
            <option>Angličtina</option>
        </select>
        Vyber druhý jazyk:
        <select id="lang">
            <option>AJ</option>
            <option>NJ</option>
        </select>
        Název:
        <input type="text" id="name">
        <script>
            function add() {
                var id = document.getElementById("content").childElementCount.toString();

                var newField = document.createElement('div');
                newField.setAttribute('style','border: 2px solid black;');

                var phrase_label = document.createTextNode('Fráze: ');
                var phrase_entry = document.createElement('input');
                phrase_entry.setAttribute('type','text');
                phrase_entry.setAttribute('id',id+'phrase');
                phrase_entry.setAttribute('name',id+'phrase');
                var phrase_break = document.createElement('br');

                var translation_label = document.createTextNode('Překlad: ');
                var translation_entry = document.createElement('input');
                translation_entry.setAttribute('type','text');
                translation_entry.setAttribute('id',id+'translation');
                translation_entry.setAttribute('name',id+'translation');
                var translation_break = document.createElement('br');

                var image_label = document.createTextNode('Obrázek: ');
                var image_entry = document.createElement('input');
                image_entry.setAttribute('type','text');
                image_entry.setAttribute('id',id+'image');
                image_entry.setAttribute('name',id+'image');

                document.getElementById("content").appendChild(newField);
                newField.appendChild(phrase_label);
                newField.appendChild(phrase_entry);
                newField.appendChild(phrase_break);
                newField.appendChild(translation_label);
                newField.appendChild(translation_entry);
                newField.appendChild(translation_break);
                newField.appendChild(image_label);
                newField.appendChild(image_entry);

                // TODO : https://stackoverflow.com/questions/3297143/dynamically-create-a-html-form-with-javascript
            }

            function get_val(id) {
                return encodeURIComponent(document.getElementById(id).value);
            }

            function save() {
                address = "save_set.php?n="+get_val("name")+"&l="+get_val("lang")+"&u="+get_user();
                i = document.getElementById("content").children;
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
                location.assign(address);
                // alert(address);
            }

            function check() {
                const collection = document.getElementById("content").children;
                for (let i = 0; i < collection.length; i++) {
                    x = collection[i];
                    if (document.getElementById(i.toString()+"phrase").value == "" || document.getElementById(i.toString()+"translation").value == "") {
                        return;
                    }
                }
                if (document.getElementById("name") == "") {return;}
                save();
            }

            function get_user() {
                return document.getElementById("username").value;
            }
        </script>
        <div id="content" name="content">
        </div>
        <?php include "insert.inc"; $user = $_SESSION["username"]; echo "<input type='hidden' id='username' value='$user'>"; ?>
        <button onclick="add()">+</button>
        <button onclick="check()">Done</button>
    </body>
</html>