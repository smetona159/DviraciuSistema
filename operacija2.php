<?php
include("include/session.php");
function displayUsers() {
    global $database, $session;

    $vartotojas = $session->username;
    //var_dump($vartotojas);
    //die();

    $q = "SELECT uzsakymo_suma,uzsakymo_data,fk_stabdziaistabdziu_id, fk_uzsakymo_buklebukles_id, fk_remasremo_id,fk_padangospadangu_id,fk_balnasbalno_id
    ,fk_ratu_komplektasrato_id, fk_pedalaipedalu_id FROM uzsakymas WHERE uzsakymas.fk_vartotojasprisijungimas='$vartotojas' ";

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

    echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
    echo "<tr><td><b>Užsakymo suma</b></td><td><b>Užsakymo data</b></td><td><b>Stabdžiai:</b></td><td><b>Rėmas:</b></td><td><b>Padangos:</b></td><td><b>Balnas:</b></td>
    <td><b>Ratai:</b></td><td><b>Pėdalai:</b></td><td><b>Būklė:</b></td></tr>\n";

    for ($i = 0; $i < $num_rows; $i++) {
        $suma = mysqli_result($result, $i, "uzsakymo_suma");
        $data = mysqli_result($result, $i, "uzsakymo_data");

        $stabdziai = mysqli_result($result, $i, "fk_stabdziaistabdziu_id");
        if(strlen($stabdziai) <1){
          $stabdziai = "0";
        }
        if(strlen($stabdziai) !=0 ){
          $stab= "SELECT stabdziu_reiksme FROM stabdziai WHERE stabdziai.stabdziu_id='$stabdziai'";
          $styb = $database->query($stab);
          $stabdom = mysqli_fetch_array($styb);
        }

        $bukle = mysqli_result($result, $i, "fk_uzsakymo_buklebukles_id");
        $buk= "SELECT bukles_reiksme FROM uzsakymo_bukle WHERE uzsakymo_bukle.bukles_id='$bukle'";
        $bak = $database->query($buk);
        $statusas = mysqli_fetch_array($bak);

        $remas = mysqli_result($result, $i, "fk_remasremo_id");
        if(strlen($remas) <1){
          $remas = "0";
        }
        if(strlen($remas) !=0 ){
          $rem= "SELECT remo_reiksme FROM remas WHERE remas.remo_id='$remas'";
          $rema = $database->query($rem);
          $riemas = mysqli_fetch_array($rema);
        }

        $padangos = mysqli_result($result, $i, "fk_padangospadangu_id");
        if(strlen($padangos) <1){
          $padangos = "0";
        }
        if(strlen($padangos) !=0 ){
          $pad = "SELECT padangu_reiksme FROM padangos WHERE padangos.padangu_id='$padangos'";
          $pada = $database->query($pad);
          $gumos = mysqli_fetch_array($pada);
        }

        $balnas = mysqli_result($result, $i, "fk_balnasbalno_id");
        if(strlen($balnas) <1){
          $balnas = "0";
        }
        if(strlen($balnas) !=0 ){
          $bal = "SELECT balno_reiksme FROM balnas WHERE balnas.balno_id='$balnas'";
          $baln = $database->query($bal);
          $sedene = mysqli_fetch_array($baln);
        }

        $ratai = mysqli_result($result, $i, "fk_ratu_komplektasrato_id");
        if(strlen($ratai) <1){
          $ratai = "0";
        }
        if(strlen($ratai) !=0 ){
          $ratuk= "SELECT rato_reiksme FROM ratu_komplektas WHERE ratu_komplektas.rato_id='$ratai'";
          $rat = $database->query($ratuk);
          $ratukas = mysqli_fetch_array($rat);
        }

        $pedalai = mysqli_result($result, $i, "fk_pedalaipedalu_id");
        if(strlen($pedalai) <1){
          $pedalai = "0";
        }
        if(strlen($pedalai) !=0 ){
          $ped = "SELECT pedalu_reiksme FROM pedalai WHERE pedalai.pedalu_id='$pedalai'";
          $peda = $database->query($ped);
          $minam = mysqli_fetch_array($peda);
        }

        echo "<tr><td>$suma €</td><td>$data</td><td>$stabdom[0]</td><td>$riemas[0]</td><td>$gumos[0]</td><td>$sedene[0]</td><td>$ratukas[0]</td><td>$minam[0]</td><td>$statusas[0]</td></tr>\n";
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
            <title>Užsakymų peržiūra</title>
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
