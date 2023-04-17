<html>
    <body>
        <?php
        include "insert.inc";
        session_start();
        $id = $_SESSION["user"];
        $name = get_user($id)["name"];
        echo "You are $name.";

        ?>
        <button onclick='window.location.assign("change_password.php")'>Change password</button>
        <button onclick='if(confirm("Do you really want to delete your account?")){window.location.assign("delete_account.php")}'>Delete account</button>
    </body>
</html>