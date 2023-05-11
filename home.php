<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            include "insert.inc";
            insert_list($_SESSION);

            $user = $_SESSION["user"];
            
            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $sets = mysqli_query($conn, "SELECT * FROM `sets` WHERE creator='$user'");
            $lang = json_decode(mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user'"))["languages"]);
        ?>

        <div class="content">
            <?php
            
            echo "<h2>Your languages:</h2>";
            if (count($lang)) {
                foreach ($lang as $key => $value) {
                    echo $value;
                }
            } else {
                echo 'You haven\'t chosen any language to learn. If you want to, click <a href="http://aceling.wz.cz/new_language.php">here</a>';
            }

            echo '<div style="height:20px"></div>';

            echo "<h2>Your sets:</h2>";
            if (mysqli_num_rows($sets) > 0) {
                while ($set = mysqli_fetch_array($sets)) {
                    $name = html_entity_decode($set["name"]);
                    $id = $set["id"];
                    echo '<div class="mset"><a href="http://aceling.wz.cz/set/set.php?i='.$id.'&back=http%3A%2F%2Faceling.wz.cz%2Fhome.php">'.$name.'</a></div>';
                }
            } else {
                echo "You have no sets yet.";
            }
            ?>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>