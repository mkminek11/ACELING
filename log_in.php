<html>
    <body>
        <div class="form">
            <form method="POST" action="authenticate.php">
                <table>
                    <tr><td>Jméno: </td><td><input type="text"     name="al-username"  autocomplete="al-username" required></td></tr>
                    <tr><td>Heslo: </td><td><input type="password" name="al-password"  autocomplete="al-password" required></td></tr>
                    <tr><td colspan="2"><input type="submit" value="OK"></td></tr>
                </table>
            </form>
            <?php
            if (isset($_GET["wrong_password"])) {
                echo "<span style='background-color: #ff8c80; color: #94170a; border: 1px solid #94170a; border-radius: 3px;'>Chybné heslo!</span>";
            }
            ?>
        </div>
    </body>
</html>