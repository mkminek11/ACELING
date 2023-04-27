<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        session_start();
        $user = (string) $_SESSION["user"];
        echo $user;

        $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
        mysqli_query($conn, "DELETE FROM `users` WHERE id=$user");
        session_unset();
        session_destroy();
        ?>
    </body>
</html>