<?php

function get_user($id) {
    $conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
    $id = (string) $id;
    $res = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE id=$id"));
    return $res;
}


session_start();
function insert_list($session) {
    if (!$session["valid"]) {header("Location: http://aceling.wz.cz/index.php", true, 301);}
    echo '<div id="lista"><nav>

        <div><a href="http://aceling.wz.cz/home.php">      Home</a></div>
        <div><a href="http://aceling.wz.cz/search.php">    Search</a></div>
        <div><a href="http://aceling.wz.cz/settings.php">  Settings</a></div>
        <div><a href="http://aceling.wz.cz/set/create.php">Create</a></div>

        <div class="right"></div>
        
        <div><a href="http://aceling.wz.cz/account/account.php">Account</a> ('.get_user($session["user"])["name"].')</div>
        <div><a href="http://aceling.wz.cz/account/auth/log_out.php">Log out</a></div>

        </nav></div>';
    }
?>