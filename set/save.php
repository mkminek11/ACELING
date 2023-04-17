<?php
$set = [];
foreach ($_GET as $key => $value) {
    if ($key == "n") {
        $set_name = $value;
    } elseif ($key == "l") {
        $set_lang = $value;
    } elseif ($key == "u") {
        $creator = $value;
    } else {
        $val = explode(",", $value);
        $set[] = [substr($val[0], 1), substr($val[1], 0, -1)];
    }
}

$conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");

mysqli_query($conn, "INSERT INTO `sets` (`name`, `lang`, `creator`) VALUES ('$set_name', '$set_lang', '$creator')");
$set_id = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `sets`"));
mysqli_query($conn, "CREATE TABLE `$set_id` (id int NOT NULL AUTO_INCREMENT, phrase varchar (60), translation varchar (60), image varchar (80), PRIMARY KEY (id))");
foreach ($set as $value) {
    $phrase = $value[0];
    $translation = $value[1];
    mysqli_query($conn, "INSERT INTO `$set_id` (phrase, translation) VALUES (\"$phrase\", \"$translation\")");
}
?>