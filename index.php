<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>2. Beadandó feladat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <style><?php include 'styles.css'; ?></style>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Turbucz Hédi</h1>
                    <h2>F1DFSX</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php
                        $bejelentkezes = 0;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $felhasznalonev = $_POST["felhasznalonev"];
                            $jelszo = $_POST["jelszo"];

                            require("bejelentkezo.php");
                            $bejelentkezes = Bejelentkezo($felhasznalonev, $jelszo);
                            if ($bejelentkezes == 1) {
                                require("bejelentkezett.php");
                                Bejelentkezett($felhasznalonev, $jelszo);
                            }
                            else if ($bejelentkezes == -2) {
                                echo "<h5 class=\"bg-danger text-white\" style=\"border-radius: 10px; text-align: center;\">Nincs ilyen felhasználó!</h5>";
                            }
                            else if ($bejelentkezes == -1) {
                                echo "<h5 class=\"bg-danger text-white\" style=\"border-radius: 10px; text-align: center;\">Hibás jelszó!</h5>";
                                echo("<script>setTimeout(function(){location.href='https://www.police.hu/'} , 3000);   </script>");
                                exit;
                            }
                        }
                    ?>
                    <div id="bejelentkezo_form" style="display: <?php if ($bejelentkezes == 1) echo 'none'; else echo 'show'?>">
                        <form action="" method="post">
                            <label for="felhasznalonev">Felhasználónév:</label><br>
                            <input type="text" id="felhasznalonev" class="form-control" name="felhasznalonev"><br>
                            <label for="jelszo">Jelszó:</label><br>
                            <input type="password" id="jelszo" class="form-control" name="jelszo"><br>
                            <input class="btn btn-warning" type="submit" value="Bejelentkezés">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./script.js"></script>
    </body>
</html>
