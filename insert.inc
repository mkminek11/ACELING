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
        <link rel="stylesheet" href="http://aceling.wz.cz/style/navigation.css">
        <div id="navigation"><nav>
            <div><a href="http://aceling.wz.cz/home.php"><img src="http://aceling.wz.cz/images/logo-normal.png" class="nav-logo"></a></div>

            <div><a href="http://aceling.wz.cz/home.php">       <span class="nav-text">Home     </span> <span class="material-symbols-rounded nav-icon">home</span>       </a></div>
            <div><a href="http://aceling.wz.cz/search.php">     <span class="nav-text">Search   </span> <span class="material-symbols-rounded nav-icon">search</span>     </a></div>
            <div><a href="http://aceling.wz.cz/settings.php">   <span class="nav-text">Settings </span> <span class="material-symbols-rounded nav-icon">settings</span>   </a></div>
            <div><a href="http://aceling.wz.cz/set/create.php"> <span class="nav-text">Create   </span> <span class="material-symbols-rounded nav-icon">add_circle</span> </a></div>
            
            <div class="right"></div>

            <div><a href="http://aceling.wz.cz/account/account.php"> <span class="nav-text">Account</span> <span class="material-symbols-rounded nav-icon">person</span> </a></div>
            <div><a href="http://aceling.wz.cz/account/auth/log_out.php"> <span class="nav-text">Log out</span> <span class="material-symbols-rounded nav-icon">logout</span></a></div>

        </nav></div>';
    }
?>