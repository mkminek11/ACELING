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

$set_data_json = json_encode($set);
$conn = mysqli_connect("sql6.webzdarma.cz", "acelingwzcz6315", "Password 1", "acelingwzcz6315");

// echo "INSERT INTO `sets` (`name`, `lang`, `creator`, `data`) VALUES ('$set_name', '$set_lang', '$creator', '$set_data_json')";

mysqli_query($conn, "INSERT INTO `sets` (`name`, `lang`, `creator`, `data`) VALUES ('$set_name', '$set_lang', '$creator', '$set_data_json')");
?>