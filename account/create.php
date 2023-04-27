<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
    </head>
    <body>
        <?php
            // include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            // insert_list($_SESSION);
        ?>
        <div class="content">
            <?php
                $username = $_POST["al-username"];
                $password = $_POST["al-password"];
                $email    = $_POST["al-email"];

                $password = hash("sha256", $password);

                $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");

                if ($_GET["success"] == 1) {
                    echo "Registrace proběhla úspěšně. Teď se zkus přihlásit.";
                } else {
                    if (mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT * FROM users WHERE name=\"$username\""))) {
                        header("Location: http://aceling.wz.cz/account/auth/sign_up.php?existing_name=1", true, 301);
                        // echo "name is already taken.";
                    } else if (mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT * FROM users WHERE email=\"$email\""))) {
                        header("Location: http://aceling.wz.cz/account/auth/sign_up.php?existing_email=1", true, 301);
                        // echo "email is already taken.";
                    } else {
                        mysqli_query($conn, "INSERT INTO users (name, password, email) VALUES ('$username', '$password', '$email')");
                        header("Location: http://aceling.wz.cz/account/create.php?success=1");
                    }
                }
            ?>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>