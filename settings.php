<html>
    <body>
        <h1>Settings:</h1>
        <?php
        include "insert.inc";
        session_start();
        $id = $_SESSION["user"];
        $name = get_user($id)["name"];
        echo "You are $name.";

        ?>
    </body>
</html>