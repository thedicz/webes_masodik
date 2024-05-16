<html>
    <body>

<?php
    function Bejelentkezo($felhasznalonev, $jelszo) {
        require("fajlbeolvaso.php");

        $adatok = FajlOlvaso();
        
        if (array_key_exists($felhasznalonev, $adatok)) {
            if ($adatok[$felhasznalonev] == $jelszo) {
                return 1;
            }
            else {
                return -1;
            }
        }
        else {
            return -2;
        }
    }
    ?>
    </body>
</html>