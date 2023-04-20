<?php

function get_user($id) {
    $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
    $id = (string) $id;
    $res = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE id=$id"));
    return $res;
}
session_start();
function insert_list($session) {
    echo '<div id="lista" class="lista"><nav><ul>

        <li><a href="http://aceling.wz.cz/home.php">      Home</a></li>
        <li><a href="http://aceling.wz.cz/search.php">    Search</a></li>
        <li><a href="http://aceling.wz.cz/settings.php">  Settings</a></li>
        <li><a href="http://aceling.wz.cz/set/create.php">Create</a></li>

        <li class="center"><a href="http://aceling.wz.cz/home.php" class="logo"><img src="logo.png" height="50"></a></li>'.(($session["valid"] == false) ? '

        <li class="right"><a href="http://aceling.wz.cz/account/auth/log_in.php">Log in</a><img src="http://aceling.wz.cz/images/user.png" height="30"></li>
        <li class="right"><a href="http://aceling.wz.cz/account/auth/sign_up.php">Sign up</a></li>

        ':'

        <li class="right"><a href="http://aceling.wz.cz/account/account.php">Account</a> ('.get_user($session["user"])["name"].')</li>
        <li class="right"><a href="http://aceling.wz.cz/account/auth/log_out.php">Log out</a></li>

        ').'

        </ul></nav></div><hr>';
    }
?>