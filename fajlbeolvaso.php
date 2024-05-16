<?php
    function FajlOlvaso() {
        $jelszo_fajl = fopen("password.txt", "r") or die("Nem sikerült megnyitni a fájlt!");
        $aktualis_bajt = ""; $visszaforgatott = "";
        $fajl_felhasznalonev = ""; $fajl_jelszo = "";
        $felezo = false;
        $megoldokulcs = [5, -14, 31, -9, 3];
        $tomb_index = 0;
        $felhasznalo_nevek = [];
        $jelszavak = [];

        while(!feof($jelszo_fajl)) {
            $aktualis_bajt = fgetc($jelszo_fajl);

            if ($aktualis_bajt == chr(0x0A)) {
                $felhasznalo_nevek[] = $fajl_felhasznalonev;
                $jelszavak[] = $fajl_jelszo;
                $fajl_felhasznalonev = "";
                $fajl_jelszo = "";
                $tomb_index = 0;
                $felezo = false;
            }
            else {
                $visszaforgatott = chr(ord($aktualis_bajt) - $megoldokulcs[$tomb_index]);
                if ($visszaforgatott == chr(0x2A)) {
                    $felezo = true;
                    $tomb_index += 1;
                    continue;
                }

                if ($felezo == true) {
                    $fajl_jelszo .= $visszaforgatott;
                    $tomb_index += 1;
                    if ($tomb_index == 5) {
                        $tomb_index = 0;
                    }
                }
                else {
                    $fajl_felhasznalonev .= $visszaforgatott;
                    $tomb_index += 1;
                    if ($tomb_index == 5) {
                        $tomb_index = 0;
                    }
                }
            }
        }

        fclose($jelszo_fajl);

        return array_combine($felhasznalo_nevek, $jelszavak);
    }
?>