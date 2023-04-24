<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
    </head>
    <body>
        <div class="content">
            <?php
            include $_SERVER['DOCUMENT_ROOT']."/insert.inc";
            insert_list($_SESSION);

            $id = $_SESSION["user"];
            $name = get_user($id)["name"];
            echo "You are $name.";

            ?>
            <button onclick='window.location.assign("http:\/\/aceling.wz.cz/change_password.php")'>Change password</button>
            <button onclick='if(confirm("Do you really want to delete your account?")){window.location.assign("http:\/\/aceling.wz.cz/account/delete_account.php")}'>
                Delete account
            </button>
        </div>
    </body>
</html>