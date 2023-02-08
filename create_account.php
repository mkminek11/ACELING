<html>
    <body>
        <?php
            include 'insert.inc';
                insert_list($_SESSION);

            $username = $_POST["al-username"];
            $password = $_POST["al-password"];
            $email    = $_POST["al-email"];

            $password = hash("sha256", $password);

            $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");

            if ($_GET["success"] == 1) {
                echo "Registrace proběhla úspěšně. Teď se zkus přihlásit.";
            } else {
                if (mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT * FROM users WHERE name=\"$username\""))) {
                    header("Location: http://aceling.wz.cz/sign_up.php?existing_name=1", true, 301);
                    exit();
                } else if (mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT * FROM users WHERE email=\"$email\""))) {
                    header("Location: http://aceling.wz.cz/sign_up.php?existing_email=1", true, 301);
                    exit();
                } else {
                    mysqli_query($conn, "INSERT INTO users (name, password, email) VALUES ('$username', '$password', '$email')");
                    header("Location: http://aceling.wz.cz/create_account.php?success=1");
                }
            }
        ?>
    </body>
</html>