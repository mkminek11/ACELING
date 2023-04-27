<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>

        <div class="content">
            <table>
                <tr><td>
                <?php
                    $id = $_SESSION["user"];
                    $name = get_user($id)["name"];
                    echo "You are $name.";
                ?>
                </td></tr>
                <tr><td><button onclick='window.location.assign("http:\/\/aceling.wz.cz/account/change_password.php")'>Change password</button>
                <tr><td><button onclick='if(confirm("Do you really want to delete your account?")){
                    window.location.assign("http:\/\/aceling.wz.cz/account/delete.php")}'>Delete account
                </button></td></tr>
            </table>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>