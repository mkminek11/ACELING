<!DOCTYPE html>
<html>
    <body>
        <h1>Settings:</h1>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/insert.inc";
        session_start();
        $id = $_SESSION["user"];
        $name = get_user($id)["name"];
        echo "You are $name.";

        ?>
    </body>
</html>