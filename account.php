<html>
    <body>
        <?php
        include "insert.inc";
        session_start();
        $id = $_SESSION["user"];
        $name = get_user($id);
        echo "You are $name.";

        ?>
        <button onclick='window.location.assign("change_password.php")'>Změnit heslo</button>
        <button onclick='window.location.assign("delete_account.php")'>Smazat účet</button>
    </body>
</html>