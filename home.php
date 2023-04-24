<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
    </head>
    <body>
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/insert.inc";
            insert_list($_SESSION);

            $user = $_SESSION["user"];
            
            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $sets = mysqli_query($conn, "SELECT * FROM `sets` WHERE creator='$user'");
            $lang = mysqli_query($conn, "SELECT * FROM `user-language` WHERE user_id='$user'");
        ?>

        <div class="content">
            <?php

            echo "<h2>Your languages:</h2>";
            if (mysqli_num_rows($lang) > 0) {
                while ($set = mysqli_fetch_array($lang)) {
                    $language = $set["language_id"];
                    echo '<a href="set.php"><div class="mlanguage">'.$language.'</div></a>';
                }
            } else {
                echo 'You haven\'t chosen any language to learn. If you want to, click <a href="http://aceling.wz.cz/new_language.php">here</a>';
            }

            echo '<div style="height:20px"></div>';

            echo "<h2>Your sets:</h2>";
            if (mysqli_num_rows($sets) > 0) {
                while ($set = mysqli_fetch_array($sets)) {
                    $name = $set["name"];
                    $id = $set["id"];
                    echo '<a href="http://aceling.wz.cz/set/set.php?i='.$id.'"><div class="mset">'.$name.'</div></a>';
                }
            } else {
                echo "You have no sets yet.";
            }
            ?>
        </div>
    </body>
</html>