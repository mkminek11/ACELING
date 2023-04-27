<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
        <meta charset="utf-8">
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
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            <?php
            $id = $_GET["i"];

            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $words = mysqli_query($conn, "SELECT * FROM `$id`");
            $set = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sets` WHERE id='$id'"));
            
            echo "Select the main language:
            <select>
                <option>Czech (Čeština)</option>
                <option>English</option>
            </select>
            Select the second language:
            <select id='lang'>
                <option>English</option>
                <option>German (Deutsch)</option>
            </select>
            Title:
            <input type='text' id='al-title'>";

            $i = 0;
            while ($w = mysqli_fetch_array($words)) {
                // print_r($w);
                $phrase = $w[1];
                $translation = $w[2];
                $image = $w[3];
                $name = (string) $i;
                echo "<div style='border: 2px solid black;'>
                Fráze:   <input type='text' id='".$name."phrase'      name='".$name."phrase'      value='$phrase'><br>
                Překlad: <input type='text' id='".$name."translation' name='".$name."translation' value='$translation'><br>
                Obrázek: <input type='text' id='".$name."image'       name='".$name."image'       value='$image'></div>";
                $i ++;
            }
            ?>
            <div id="content" name="content"></div>
            <button onclick="add()">+</button>
            <button onclick="check()">Save</button>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>