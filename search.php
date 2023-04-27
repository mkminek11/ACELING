<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            <?php
            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");

            if (!isset($_GET["q"])) {
                echo '
                    <form action="search.php" autocomplete="off"><input type="text" id="q" name="q"><button type="submit">OK</button></form>
                    <h1>Or browse:</h1>';
                $sets = mysqli_query($conn, "SELECT * FROM `sets`");
            } else {
                $name = $_GET["q"];
                $sets = mysqli_query($conn, "SELECT * FROM `sets` WHERE name LIKE '%$name%'");
            }

            if (mysqli_num_rows($sets) == 0) {echo "<h1>No results.</h1>Sorry. We can't find anything like '$name'";}
            while($set = mysqli_fetch_assoc($sets)) {
                $name = $set["name"];
                $id = $set["id"];
                echo '<a href="http://aceling.wz.cz/set/set.php?i='.$id.'&back='.urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]").'"><div style="width: 100px; height: 100px; border: 2px solid black; border-radius: 5px; margin: 10px;">'.$name.'</div></a>';
            }
            ?>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>