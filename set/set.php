<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">
        <meta charset="utf-8">
        <style>
            h1 {width: 100%; display: inline-block; text-align: center;}
            td {max-width: 100px; min-width: 100px; overflow: hidden; text-overflow: ellipsis;}
            table {margin: auto;}
        </style>
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
            
            $id = $_GET["i"];
            $back = $_GET["back"];
        ?>
        
        <div class="content">
            <?php
                echo "<ul><li><a href='cards.php?i=$id'>Cards</a></li><li><a href='$back'>Back</a></li></ul>";

                $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
                $set = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sets` WHERE id='$id'"));
                $words = json_decode($set["data"]);

                echo "<h1>".html_entity_decode($set["name"])."</h1>";
            ?>

            <table>

                <?php
                    foreach ($words as $key => $value) {
                        $phrase = $value[0];
                        $translation = $value[1];
                        echo "<tr><td><span>$phrase</span></td><td><span>$translation</span></td></tr>";
                    }
                
                    if ((string) $_SESSION["user"] == (string) $set["creator"]) {
                        echo "<button>DELETE</button>";
                        echo "<button onclick='location.assign(\"edit.php?i=$id\")'>EDIT</button>";
                    }
                
                ?>
            </table>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>