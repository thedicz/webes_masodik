<html>
    <head>
        <style><?php include 'styles.css'; ?></style>
    </head>
    <body>
        <?php
            function Bejelentkezett($felhasznalonev) {
                $servername = "sql113.infinityfree.com";
                $username = "if0_36552526";
                $password = "UGhyn1kOZB6q";

                $conn = new mysqli($servername, $username, $password);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT tabla.* FROM if0_36552526_adatb.tabla WHERE tabla.username = '$felhasznalonev'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    require("szinvalaszto.php");
                    $row = $result->fetch_assoc();
                    echo "Üdvözlünk " . $felhasznalonev . " ! ";
                    $titkos_szin_kod = Szinvalaszto($row["Titkos"]); 
                    echo "<div style=\"background-color: $titkos_szin_kod; width: 150px; height: 150px; border-radius: 15px; display: table;\"><p style=\"text-align: center;  vertical-align: middle; display: table-cell;\">Titkos szín</p></div><br>";
                    echo "<a href=\"index.php\"><button class=\"btn btn-warning id=\"kijelentkezes\">Kijelentkezés</button></a>\n";
                } else {
                    echo "Nem volt találat az adatbázisban! :(";
                }
                $conn->close();
            }
        ?>
    </body>
</html>