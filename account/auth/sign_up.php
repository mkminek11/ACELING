<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/form.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
    </head>
    <body>
        <div class="content form">
            <h2>Sign up</h2>
            <form method="POST" action="http://aceling.wz.cz/account/create.php">
                <table>
                    <tr><td>Username:  </td><td><input type="text"     name="al-username"  autocomplete="al-username" required></td></tr>
                    <tr><td>E-mail:    </td><td><input type="email"    name="al-email"     autocomplete="al-email"    required></td></tr>
                    <tr><td>Password:  </td><td><input type="password" name="al-password"  autocomplete="al-password" required></td></tr>
                </table>
                <input type="submit" value="OK">
            </form>
            <?php
            if (isset($_GET["existing_name"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Toto jméno už je zabrané!</span>";
            } else if (isset($_GET["existing_email"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Tento email už se používá!</span>";
            }
            ?>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>