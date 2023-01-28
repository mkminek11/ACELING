<?php

echo '<div id="lista" class="lista"><nav><ul>

        <a href="index.php" class="logo"><img src="img/logo2.png"></a>
        <li><a href="about.php">O nás</a></li>
        <li><a href="groups.php">Skupiny</a></li>'.(($_SESSION["valid"] == true) ? '

        <li class="right"><a href="account.php">Účet</a></li>
        <li class="right"><a href="logout.php">Odhlásit</a></li>':'

        <li class="right"><a href="login.php">Přihlásit se</a></li>
        <li class="right"><a href="signin.php">Registrovat se</a></li>').'
        
        </ul></nav></div>';

?>