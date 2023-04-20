<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
    </head>
    <body>
        <?php
        include "insert.inc";
        insert_list($_SESSION);

        $user = $_SESSION["user"];

        if ($_SESSION["valid"] == true) {
            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $sets = mysqli_query($conn, "SELECT * FROM `sets` WHERE creator='$user'");
            if (mysqli_num_rows($sets) > 0) {
                echo "<h2>Your sets:</h2>";
                while ($set = mysqli_fetch_array($sets)) {
                    $name = $set["name"];
                    $id = $set["id"];
                    echo '<a href="set.php?i='.$id.'"><div style="width: 100px; height: 100px; border: 2px solid black; border-radius: 5px; margin: 10px;">'.$name.'</div></a>';
                }
            }
        }
        ?>
    </body>
</html>