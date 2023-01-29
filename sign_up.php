<html>
    <body>
        <?php include "insert.inc"; ?>
        <div class="form">
            <form method="POST" action="create_account.php">
                <table>
                    <tr><td>Přezdívka: </td><td><input type="text"     name="al-username"  autocomplete="al-username" required></td></tr>
                    <tr><td>E-mail:    </td><td><input type="email"    name="al-email"     autocomplete="al-email"    required></td></tr>
                    <tr><td>Heslo:     </td><td><input type="password" name="al-password"  autocomplete="al-password" required></td></tr>
                    <tr><td colspan="2"><input type="submit" value="OK"></td></tr>
                </table>
            </form>
            <?php
            if (isset($_GET["existing_name"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Toto jméno už je zabrané!</span>";
            } else if (isset($_GET["existing_email"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Tento email už se používá!</span>";
            }
            ?>
        </div>
    </body>
</html>