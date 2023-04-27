<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/form.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
    </head>
    <body>
        <div class="content form">
            <h2>Log in</h2>
            <form method="POST" action="http://aceling.wz.cz/account/auth/authenticate.php">
                <table>
                    <tr><td>Username: </td><td><input type="text"     name="al-username"  autocomplete="al-username" required></td></tr>
                    <tr><td>Password: </td><td><input type="password" name="al-password"  autocomplete="al-password" required></td></tr>
                </table>
                <input type="submit" value="OK">
            </form>
            <?php
            if (isset($_GET["wrong_password"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Chybné heslo!</span>";
            }
            ?>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>