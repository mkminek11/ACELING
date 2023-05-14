<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://aceling.wz.cz/style/default.css">
        <link rel="stylesheet" href="http://aceling.wz.cz/style/all.css">
        <script src="notebook.js"></script>
    </head>
    <body onload="n.start()">
        <?php
            include_once("$_SERVER[DOCUMENT_ROOT]/insert.inc");
            insert_list($_SESSION);
        ?>
        <div class="sidebar">
            <ul>
                <li><button onclick="n.switch_to(0)">Profile</button></li>
                <li><button onclick="n.switch_to(1)">Appearance</button></li>
            </ul>
        </div>
        <div class="main content">
            <form class="notebook" action="save_settings.php" method="GET" id="s-notebook">
                
                <!----------------------------------  profile settings  -------------------------------------->
                <div class="section" id="s-profile">
                    <h1>Profile settings:</h1>
                    <button onclick='window.location.assign("http:\/\/aceling.wz.cz/account/change_password.php")'>Change password</button>
                    <button onclick='if(confirm("Do you really want to delete your account?")){location.assign("http:\/\/aceling.wz.cz/account/delete.php")}'>Delete account</button>
                </div>
            
                <!---------------------------------  appearance settings  ------------------------------------>
                <div class="section" id="s-appearance">
                    <h1>Appearance settings:</h1>
                    <p><label>Language:<select id="language">
                        <option selected>English</option>
                        <optgroup label="Sorry, there are no other available languages yet."></optgroup>
                    </select></label></p>
                    <p><label><input type="checkbox" id="dark-mode" name="dark-mode" value="1">Dark mode</label></p>
                    <p>Show in navigation:
                        <label class="radio"><input type="radio" name="nav-show" id="nav-0" value="0"        >Just text     </label>
                        <label class="radio"><input type="radio" name="nav-show" id="nav-1" value="1"        >Just icons    </label>
                        <label class="radio"><input type="radio" name="nav-show" id="nav-2" value="2"        >Icons and text</label>
                        <label class="radio"><input type="radio" name="nav-show" id="nav-3" value="3" checked>Text and icons</label>
                    </p>
                </div>

                <p><input type="submit" value="Done"></p>
            </form>
        </div>
        <div class="blue-bg"></div>
        <script>const n = new Notebook('s-notebook', ['s-profile', 's-appearance']);</script>
    </body>
</html>