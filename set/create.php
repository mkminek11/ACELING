<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/create_set.css">
        <script src="http://aceling.wz.cz/set/create.js"></script>
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            Select primary language: <select>
                <option value="cs">Czech (Čeština)</option>
                <option value="en">English</option>
            </select> Select second language: <select id="lang">
                <option value="en">English</option>
                <option value="de">German (Deutsch)</option>
            </select> Title: <input type="text" id="al-title">

            <div id="box" name="box"></div>
            <?php $user = $_SESSION["user"]; echo "<input type='hidden' id='user' value='$user'>"; ?>

            <button onclick="add()">+</button>
            <button onclick="check()">Done</button>
        </div>
    <div class="blue-bg"></div>
    </body>
</html>