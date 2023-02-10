<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="search.php"><input type="text" id="q" name="q"><button type="submit">OK</button></form>
        <h1>Or browse:</h1>
        <?php
        $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
        $sets = mysqli_query($conn, "SELECT * FROM `sets`");
        // foreach ($sets as $set) {
            // echo $set;
        // }
        while($set = mysqli_fetch_assoc($sets)) {
            // echo "Id: " . $set["id"]. " - Name: " . $set["name"]. " - Language: " . $set["lang"]. "<br>";
            $name = $set["name"];
            $id = $set["id"];
            echo '<a href="set.php?i='.$id.'"><div style="width: 100px; height: 100px; border: 2px solid black; border-radius: 5px; margin: 10px;">'.$name.'</div></a>';
        }
        ?>
    </body>
</html>