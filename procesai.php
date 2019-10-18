<?php

include("include/session.php");

class ManagerProcess
{
  function ManagerProcess(){
  global $session;

  if (isset($_POST['sukurti'])) {
      $this->Prideti_Uzsakyma();
  }

  if (isset($_POST['keiciambusena'])) {
      $this->PakeistiBusena();
  }
  if (isset($_GET['d'])) {
      $this->procDeleteUzsakymas();
  }
  if (isset($_POST['trinam'])) {
      $this->Trinimas();
  }

}
    function Prideti_Uzsakyma()
    {
    global $session, $database, $form;

    $uzsakymoPavadinimas = "Sudarytas";
    $uzsakymoKiekis = "NULL";
    $uzsakymoSuma = "NULL";
    $uzsakymoData = "CURRENT_TIMESTAMP";
    $stabdziuID = $_POST['stabdziu_id'];
    $buklesID = "1";
    $remoID = $_POST['remo_id'];
    $prisijungimas = $session->username;
    $padanguID= $_POST['padangu_id'];
    $balnoID= $_POST['balnas_id'];
    $ratoID= $_POST['ratu_id'];
    $pedaluID= $_POST['pedalu_id'];
    $prisijungimas1= "NULL";





    $field = "sukurti";  //Use field name for username
    if (strlen($pedaluID)<1 && strlen($ratoID)<1 && strlen($balnoID)<1 && strlen($padanguID)<1 && strlen($remoID)<1 && strlen($stabdziuID)<1) {
        $form->setError($field, "* Nepasirinkta jokia dalis");
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = $form->getErrorArray();
        //var_dump($_SESSION['error_array'] = $form->getErrorArray());
        //die();
        header("Location: " . $session->referrer);

    }

    if (strlen($pedaluID)>0 || strlen($ratoID)>0 || strlen($balnoID)>0 || strlen($padanguID)>0 || strlen($remoID)>0 || strlen($stabdziuID)>0) {


    if(strlen($stabdziuID)<1)
    {
      $stabdziuID = "NULL";
    }
    if(strlen($buklesID)<1)
    {
      $buklesID = "NULL";
    }
    if(strlen($remoID)<1)
    {
      $remoID = "NULL";
    }
    if(strlen($padanguID)<1)
    {
      $padanguID = "NULL";
    }
    if(strlen($balnoID)<1)
    {
      $balnoID = "NULL";
    }
    if(strlen($ratoID)<1)
    {
      $ratoID = "NULL";
    }
    if(strlen($pedaluID)<1)
    {
      $pedaluID = "NULL";
    }


    if(strlen($balnoID)>0)
    {
      $balnokiekis= "SELECT balno_kiekis FROM balnas WHERE balnas.balno_id='$balnoID'";
      $balnaskiekis = $database->query($balnokiekis);
      $balnoCount = mysqli_fetch_array($balnaskiekis);
      $q = "UPDATE balnas SET balno_kiekis = $balnoCount[0]-1 WHERE balnas.balno_id = '$balnoID'";
      $result = $database->query($q);

      $balnokaina= "SELECT balno_kaina FROM balnas WHERE balnas.balno_id='$balnoID'";
      $balnask = $database->query($balnokaina);
      $balnoPrice = mysqli_fetch_array($balnask);

      $uzsakymoSuma += $balnoPrice[0];
    }
    if( strlen($padanguID)>0 )
    {
      $Padangakiekis= "SELECT padangu_kiekis FROM padangos WHERE padangos.padangu_id='$padanguID'";
      $padangukiekis = $database->query($Padangakiekis);
      $padangosCount = mysqli_fetch_array($padangukiekis);
      $q = "UPDATE padangos SET padangu_kiekis = $padangosCount[0]-1 WHERE padangos.padangu_id='$padanguID'";
      $result = $database->query($q);

      $padangoskaina= "SELECT padangu_kaina FROM padangos WHERE padangos.padangu_id='$padanguID'";
      $padangak = $database->query($padangoskaina);
      $padangosPrice = mysqli_fetch_array($padangak);

      $uzsakymoSuma += $padangosPrice[0];
    }
    if( strlen($stabdziuID)>0 )
    {
      $Stabdiskiekis= "SELECT stabdziu_kiekis FROM stabdziai WHERE stabdziai.stabdziu_id='$stabdziuID'";
      $stabdziukiekis = $database->query($Stabdiskiekis);
      $stabdziaiCount = mysqli_fetch_array($stabdziukiekis);
      $q = "UPDATE stabdziai SET stabdziu_kiekis = $stabdziaiCount[0]-1 WHERE stabdziai.stabdziu_id='$stabdziuID'";
      $result = $database->query($q);

      $stabdziokaina= "SELECT stabdziu_kaina FROM stabdziai WHERE stabdziai.stabdziu_id='$stabdziuID'";
      $stabdk = $database->query($stabdziokaina);
      $stabdzioPrice = mysqli_fetch_array($stabdk);

      $uzsakymoSuma += $stabdzioPrice[0];
    }
    if( strlen($remoID)>0 )
    {
      $Remokiekis= "SELECT remo_kiekis FROM remas WHERE remas.remo_id='$remoID'";
      $remaskiekis = $database->query($Remokiekis);
      $remasCount = mysqli_fetch_array($remaskiekis);
      $q = "UPDATE remas SET remo_kiekis = $remasCount[0]-1 WHERE remas.remo_id='$remoID'";
      $result = $database->query($q);

      $remkaina= "SELECT remo_kaina FROM remas WHERE remas.remo_id='$remoID'";
      $remk = $database->query($remkaina);
      $remPrice = mysqli_fetch_array($remk);

      $uzsakymoSuma += $remPrice[0];
    }
    if( strlen($ratoID)>0 )
    {
      $Rataskiekis= "SELECT rato_kiekis FROM ratu_komplektas WHERE ratu_komplektas.rato_id='$ratoID'";
      $ratukiekis = $database->query($Rataskiekis);
      $ratasCount = mysqli_fetch_array($ratukiekis);
      $q = "UPDATE ratu_komplektas SET rato_kiekis = $ratasCount[0]-1 WHERE ratu_komplektas.rato_id='$ratoID'";
      $result = $database->query($q);

      $rataskaina= "SELECT rato_kaina FROM ratu_komplektas WHERE ratu_komplektas.rato_id='$ratoID'";
      $ratask = $database->query($rataskaina);
      $ratasPrice = mysqli_fetch_array($ratask);

      $uzsakymoSuma += $ratasPrice[0];
    }
    if( strlen($pedaluID)>0 )
    {
      $Pedalaikiekis= "SELECT pedalu_kiekis FROM pedalai WHERE pedalai.pedalu_id='$pedaluID'";
      $pedalukiekis = $database->query($Pedalaikiekis);
      $pedalasCount = mysqli_fetch_array($pedalukiekis);
      $q = "UPDATE pedalai SET pedalu_kiekis = $pedalasCount[0]-1 WHERE pedalai.pedalu_id='$pedaluID'";
      $result = $database->query($q);

      $pedalokaina= "SELECT pedalu_kaina FROM pedalai WHERE pedalai.pedalu_id='$pedaluID'";
      $pedalok = $database->query($pedalokaina);
      $pedaloPrice = mysqli_fetch_array($pedalok);

      $uzsakymoSuma += $pedaloPrice[0];
    }


    $q = "INSERT INTO uzsakymas
             VALUES (NULL, '$uzsakymoPavadinimas', $uzsakymoKiekis, $uzsakymoSuma,
                $uzsakymoData, $stabdziuID, $buklesID, $remoID, '$prisijungimas',
                $padanguID, $balnoID, $ratoID, $pedaluID, $prisijungimas1)";


                //var_dump($q);
                //die();
      $result = $database->query($q);
      header("Location: " . $session->referrer);
  }
}

  function PakeistiBusena() {
      global $session, $database, $form, $connection;
      /* Username error checking */

      $ID =  (int) $_POST['updID'];
      $Busena = (int) $_POST['busena'];

    $q = "UPDATE uzsakymas SET fk_uzsakymo_buklebukles_id = $Busena WHERE id = $ID";

    $result = $database->query($q);

    header("Location: " . $session->referrer);
     }
     function Trinimas() {
       global $session, $database, $form;
       /* Username error checking */
       $ID =  $_REQUEST['updID'];
       $trim= $_POST['trintukas'];
      if($trim ==1){
           $q = "DELETE FROM uzsakymas WHERE id = $ID";
           //var_dump($q);
           //die();
           $database->query($q);
           header("Location: " . localhost/yiiproject/web/index.php?r=site%2Fabout);
}
        }

     function procDeleteUzsakymas() {
         global $session, $database, $form;
         /* Username error checking */
         $ID =  $_REQUEST['deluzsk'];

             $q = "DELETE FROM uzsakymas WHERE id = $ID";
             //var_dump($q);
             //die();
             $database->query($q);
             header("Location: " . $session->referrer);

     }



}

  /* Initialize process */
  $managerprocces = new ManagerProcess();
?>
