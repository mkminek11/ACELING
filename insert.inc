<?php

echo '<div id="lista" class="lista"><nav><ul>

        <li><a href="index.php">Domů</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="create.php">Create</a></li>

        <li class="center"><a href="index.php" class="logo"><img src="logo.png" height="50"></a></li>'.(($_SESSION["valid"] == false) ? '

        <li class="right"><a href="account.php">Účet</a></li>
        <li class="right"><a href="log_out.php">Odhlásit</a></li>':'

        <li class="right"><a href="log_in.php">Přihlásit se</a><img src="user.png" height="30"></li>
        <li class="right"><a href="signin.php">Registrovat se</a></li>').'
        
        </ul></nav></div>';

?>