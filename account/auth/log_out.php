<?php
session_start();
session_unset();
session_destroy();

header("Location: http://aceling.wz.cz/home.php", true, 301);
exit();
?>