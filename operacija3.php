<?php
include("include/session.php");
function displayUsers() {
    global $database;

    $q = "SELECT id, uzsakymo_suma,uzsakymo_data, fk_uzsakymo_buklebukles_id, fk_vartotojasprisijungimas FROM uzsakymas";

    $result = $database->query($q);
    /* Error occurred, return given name by default */
    $num_rows = mysqli_num_rows($result);
    if (!$result || ($num_rows < 0)) {
        echo "Error displaying info";
        return;
    }
    if ($num_rows == 0) {
        echo "Lentelė tuščia.";
        return;
    }
    /* Display table contents */
    echo "<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
    echo "<tr><td><b>Užsakymo ID</b></td><td><b>Užsakymo suma</b></td><td><b>Užsakymo data</b></td><td><b>Būklė:</b></td><td><b>Užsakovas</b></td></tr>\n";

    for ($i = 0; $i < $num_rows; $i++) {
      $id = mysqli_result($result, $i, "id");
        $suma = mysqli_result($result, $i, "uzsakymo_suma");
        $data = mysqli_result($result, $i, "uzsakymo_data");

        $bukle = mysqli_result($result, $i, "fk_uzsakymo_buklebukles_id");
        $buk= "SELECT bukles_reiksme FROM uzsakymo_bukle WHERE uzsakymo_bukle.bukles_id='$bukle'";
        $bak = $database->query($buk);
        $statusas = mysqli_fetch_array($bak);

        $uzsakovas = mysqli_result($result, $i, "fk_vartotojasprisijungimas");


        $ulevel = mysqli_result($result, $i, "fk_uzsakymo_buklebukles_id");
        $ulevelname = '';
        switch ($ulevel)
        {
            case SUDARYTAS_LEVEL:
                $ulevelname = SUDARYTAS_NAME;
                break;
            case PATVIRTINTAS_LEVEL:
                $ulevelname = PATVIRTINTAS_NAME;
                break;
            case ATSAUKTAS_LEVEL:
                $ulevelname = ATSAUKTAS_NAME;
                break;
            default :
                $ulevelname = 'Neegzistuojantis tipas';
        }

        $pakeistiBusena = '<form action="procesai.php" method="POST">

        <input type="hidden" name="updID" value="'.$id.'">
        <input type="hidden" name="keiciambusena" value="1">
        <select name="busena" onChange="alert(\'Pakeista užsakymo būsena!\');submit();">
            <option value="'.SUDARYTAS_LEVEL.'" '.($ulevel == SUDARYTAS_LEVEL? 'selected':'').'>'.SUDARYTAS_NAME.'</option>
            <option value="'.PATVIRTINTAS_LEVEL.'" '.($ulevel == PATVIRTINTAS_LEVEL? 'selected':'').'>'.PATVIRTINTAS_NAME.'</option>
            <option value="'.ATSAUKTAS_LEVEL.'" '.($ulevel == ATSAUKTAS_LEVEL? 'selected':'').'>'.ATSAUKTAS_NAME.'</option>
        </select>


                    </form>';
        echo "<tr><td>$id</td><td>$suma €</td><td>$data</td><td>$pakeistiBusena</td><td>$uzsakovas</td></tr>\n";
  }
    echo "</table><br>\n";
}

function mysqli_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];

}
if ($session->logged_in) {
    ?>
    <html>
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
            <title>Užsakymų tvarkymas</title>
            <link href="include/styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <table class="center"><tr><td>
                        <img src="pictures/top.png"/>
                    </td></tr><tr><td>
                        <?php
                        include("include/meniu.php");
                        ?>
                        <table style="border-width: 2px; border-style: dotted;"><tr><td>
                                    Atgal į [<a href="index.php">Pradžia</a>]
                                </td></tr></table>
                        <br>
                        <?php
                        displayUsers();
                        //include("sudarymo_forma.php");

                        ?>
                        <br>
                <tr><td>
                        <?php
                        include("include/footer.php");
                        ?>
                    </td></tr>
            </table>
        </body>
    </html>
    <?php
    //Jei vartotojas neprisijungęs, užkraunamas pradinis puslapis
} else {
    header("Location: index.php");
}
?>
