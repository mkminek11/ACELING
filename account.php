<html>
    <body>
        <?php
        include "insert.inc";
        session_start();
        $name = $_SESSION["username"];
        echo "You are $name.";

        ?>
        <button onclick='window.location.assign("change_password.php")'>Změnit heslo</button>
        <button onclick='window.location.assign("delete_account.php")'>Smazat účet</button>
    </body>
</html>