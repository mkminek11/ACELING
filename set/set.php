<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            span, h1 {width: 100%; display: inline-block; text-align: center;}
            td {max-width: 100px; min-width: 100px; overflow: hidden; text-overflow: ellipsis;}
            table {margin: auto;}
        </style>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/insert.inc";
        insert_list($_SESSION);
        
        $id = $_GET["i"];
        $back = $_GET["back"];

        echo "<ul><li><a href='cards.php?i=$id'>Cards</a></li><li><a href='$back'>Back to Search</a></li></ul>";
        
        $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
        $words = mysqli_query($conn, "SELECT * FROM `$id`");
        $set = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sets` WHERE id='$id'"));

        echo "<h1>".$set["name"]."</h1>";
        ?>

        <table>
        
        <?php
        $x = 0;
        while ($word = mysqli_fetch_assoc($words)) {
            $phrase = $word["phrase"];
            $translation = $word["translation"];
            echo "<tr><td><span>$phrase</span></td><td><span>$translation</span></td></tr>";
            $x += 1;
        }

        if ((string) $_SESSION["user"] == (string) $set["creator"]) {
            echo "<button>DELETE</button>";
            echo "<button onclick='location.assign(\"edit.php\")'>EDIT</button>";
        }

        ?>
        </table>
    </body>
</html>