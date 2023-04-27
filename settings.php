<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/all.css">
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            <h1>Settings:</h1>
            <p>
                <input type="checkbox" id="dark-mode" name="dark-mode"><label for="dark-mode">Dark mode</label>
            </p>
            <p>
            Show in navigation:
            <br><input type="radio" name="nav-show" id="nav-0" value="0"><label for="nav-0">Just text</label>
            <br><input type="radio" name="nav-show" id="nav-1" value="1"><label for="nav-1">Just icons</label>
            <br><input type="radio" name="nav-show" id="nav-2" value="2"><label for="nav-2">Text and icons</label>
            <br><input type="radio" name="nav-show" id="nav-3" value="3"><label for="nav-3">Icons and text</label>
            </p>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>