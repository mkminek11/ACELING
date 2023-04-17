<html>
    <head>
        <meta charset="utf-8">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&display=swap');
            p {
                font-family: Montserrat Alternates;
                text-align: center;
            }
        </style>
        <script>
            function turn(id) {
                div = document.getElementById(id);
                actual = div.getElementsByTagName("input")[0].value;
                if (actual == "phrase") {
                    div.getElementsByTagName("p")[0].style.display = "none";
                    div.getElementsByTagName("p")[1].style.display = "block";
                    div.getElementsByTagName("input")[0].value = "translation";
                } else {
                    div.getElementsByTagName("p")[0].style.display = "block";
                    div.getElementsByTagName("p")[1].style.display = "none";
                    div.getElementsByTagName("input")[0].value = "phrase";
                }
            }
        </script>
    </head>
    <body>
        <?php
        include "insert.inc";
        insert_list($_SESSION);

        $id = $_GET["i"];

        echo "<h2><a href='set.php?i=$id'>Back to set ></a></h2>";

        $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
        $words = mysqli_query($conn, "SELECT * FROM `$id`");
        $set = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sets` WHERE id='$id'"));
        
        // echo "Id: " . $set["id"]. " - Name: " . $set["name"]. " - Language: " . $set["lang"]. "<br>";

        $x = 0;
        while ($word = mysqli_fetch_assoc($words)) {
            $phrase = $word["phrase"];
            $translation = $word["translation"];
            echo '
            <div style="width: 100px; height: 100px; border: 2px solid black; border-radius: 5px; margin: 10px; user-select: none;" id="'.$x.'" onclick="turn('.$x.')">
                <p>'.$phrase.'</p>
                <p style="display: none;">'.$translation.'</p>
                <input type="hidden" value="phrase">
            </div>';
            $x += 1;
        }

        ?>
    </body>
</html>