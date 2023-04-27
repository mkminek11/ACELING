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
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
        <link rel="stylesheet" href="http://aceling.wz.cz/navigation.css">
        <div id="navigation"><nav>
            <div><a href="http://aceling.wz.cz/home.php"><img src="http://aceling.wz.cz/images/logo.png"></a></div>

            <div><a href="http://aceling.wz.cz/home.php">      Home     <span class="material-symbols-rounded">home</span>      </a></div>
            <div><a href="http://aceling.wz.cz/search.php">    Search   <span class="material-symbols-rounded">search</span>    </a></div>
            <div><a href="http://aceling.wz.cz/settings.php">  Settings <span class="material-symbols-rounded">settings</span>  </a></div>
            <div><a href="http://aceling.wz.cz/set/create.php">Create   <span class="material-symbols-rounded">add_circle</span></a></div>
            
            <div class="right"></div>

            <div><a href="http://aceling.wz.cz/account/account.php">Account</a> ('.get_user($session["user"])["name"].')</div>
            <div><a href="http://aceling.wz.cz/account/auth/log_out.php">Log out</a></div>

        </nav></div>';
    }
?>