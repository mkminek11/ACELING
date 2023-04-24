<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/insert.inc";
        insert_list($_SESSION);

        echo "<h2>Change password:</h2>";

        $user = (string) $_SESSION["user"];
        $new = $_POST["new"];

        if ($_POST["a"] == "c") {
            if (!isset($new, $_POST["rep"], $_POST["old"])) {
                header("Location: http://aceling.wz.cz/change_password.php?message=".urlencode("You must fill everything!"), true, 301);
            } else if ($new != $_POST["rep"]) {
                header("Location: http://aceling.wz.cz/change_password.php?message=".urlencode("Passwords don't match."), true, 301);
            } else {
                $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
                $password = hash("sha256", $new);
                echo "Password changed successfully: ".str_repeat("•", strlen($new));
                mysqli_query($conn, "UPDATE `users` SET password = \"$password\" WHERE id=$user");
            }
        } else if ($_POST["a"] == "s") {
            echo "Change successful!";
        } else if ($_SESSION["valid"] == true) {
            echo "<form method='POST' action='change_password.php'>
            Old password: <input type='password' name='old'>
            New password: <input type='password' name='new'>
            Repeat new password: <input type='password' name='rep'>
            <input type='text' name='a' value='c' style='display:none'>
            <input type='submit' value='OK'>
            $_GET[message]</form>";
        }
        ?>
    </body>
</html>