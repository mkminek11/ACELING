<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">
    </head>
    <body>
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="content">
            <form action="save_settings.php" method="GET">
                <h1>Settings:</h1>
                
                <p><label>
                    Language:
                    <select id="language">
                        <option selected>English</option>
                        <optgroup label="Sorry, there are no other available languages yet."></optgroup>
                    </select>
                </label></p>

                <p><label><input type="checkbox" id="dark-mode" name="dark-mode" value="1">Dark mode</label></p>

                <p>Show in navigation:
                    <label class="radio"><input type="radio" name="nav-show" id="nav-0" value="0"        >Just text     </label>
                    <label class="radio"><input type="radio" name="nav-show" id="nav-1" value="1"        >Just icons    </label>
                    <label class="radio"><input type="radio" name="nav-show" id="nav-2" value="2"        >Icons and text</label>
                    <label class="radio"><input type="radio" name="nav-show" id="nav-3" value="3" checked>Text and icons</label>
                </p>

                <p><input type="submit" value="Done"></p>
            </form>
        </div>
        <div class="blue-bg"></div>
    </body>
</html>