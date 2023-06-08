<?php

session_start();

$conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");
$user_id = $_SESSION["user"];

function save($column, $value) {
    global $conn, $user_id;
    mysqli_query($conn, "UPDATE `users` SET `$column` = '$value' WHERE `id` = $user_id");
}


foreach ($_POST as $key => $value) {
    save($key, $value);
}

echo "Data changed successfully.";

?>