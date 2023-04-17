<html>
    <body>
        <?php
            $username = $_POST["al-username"];
            $password = $_POST["al-password"];

            $password = hash("sha256", $password);

            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
            $res = mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT * FROM users WHERE name=\"$username\" AND password=\"$password\""));

            if ($res) {
                session_start();
                // print_r($res["id"]);
                $_SESSION["valid"] = true;
                $_SESSION["user"] = (int) $res["id"];
                header("Location: http://aceling.wz.cz/home.php", true, 301);
                exit();
                
            } else {
                header("Location: http://aceling.wz.cz/log_in.php?wrong_password=1", true, 301);
                exit();
            }
        ?>
    </body>
</html>