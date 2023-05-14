<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/create_set.css">
        <script src="http://aceling.wz.cz/set/create.js"></script>
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            Select the main language:
            <select>
                <option value="cs">Czech (Čeština)</option>
                <option value="en">English</option>
            </select>
            Select the second language:
            <select id='lang'>
                <option value="en">English</option>
                <option value="de">German (Deutsch)</option>
            </select>
            Title:

            
            <?php
            $id = $_GET["i"];
            
            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $set = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sets` WHERE id='$id'"));
            $words = json_decode($set["data"]);
            
            $title = $set["name"];
            
            echo "<input type='text' id='al-title' value='$title'>";
            echo '<div id="box" name="box">';
            
            foreach ($words as $index => $value) {
                $phrase = $value[0];
                $translation = $value[1];
                $image = $value[3];
                echo "<div>
                Fráze:   <input type='text' id='".$index."phrase'      name='".$index."phrase'      value='$phrase'><br>
                Překlad: <input type='text' id='".$index."translation' name='".$index."translation' value='$translation'><br>
                Obrázek: <input type='text' id='".$index."image'       name='".$index."image'       value='$image'></div>";
            }
            ?>

            </div>
            <?php 
            $user = $_SESSION["user"];
            echo "<input type='hidden' id='user' value='$user'>";
            $id = $_GET["i"];
            echo "<input type='hidden' id='id'   value='$id'>";
            ?>

            <button onclick="add()">+</button>
            <button onclick="edit()">Save</button>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>