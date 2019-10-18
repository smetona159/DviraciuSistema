<?php
//Formuojamas meniu.
if (isset($session) && $session->logged_in) {
    $path = "";
    if (isset($_SESSION['path'])) {
        $path = $_SESSION['path'];
        unset($_SESSION['path']);
    }
    ?>
    <table width=100% border="0" cellspacing="1" cellpadding="3" class="meniu">
        <?php
        echo "<tr><td>";
        echo "Prisijungęs vartotojas: <b>$session->username</b> <br>";
        echo "</td></tr><tr><td>";
        echo "[<a href=\"" . $path . "userinfo.php?user=$session->username\">Mano paskyra</a>] &nbsp;&nbsp;"
        . "[<a href=\"" . $path . "useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;"
        . "[<a href=\"" . $path . "operacija1.php\">Dviračio sudarymas</a>] &nbsp;&nbsp;"
        . "[<a href=\"" . $path . "operacija2.php\">Užsakymų peržiūra</a>] &nbsp;&nbsp;";
        //Trečia operacija rodoma valdytojui ir administratoriui
        if ($session->isManager()) {
            echo "[<a href=\"" . $path . "operacija3.php\">Užsakymų tvarkymas</a>] &nbsp;&nbsp;";
        }
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($session->isAdmin()) {
          echo "[<a href=\"" . $path . "operacija4.php\">Užsakymų tvarkymas</a>] &nbsp;&nbsp;"
            ."[<a href=\"" . $path . "admin/admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        echo "[<a href=\"" . $path . "process.php\">Atsijungti</a>]";
        echo "</td></tr>";
        ?>
    </table>
    <?php
}//Meniu baigtas
?>

<?php
/*
  //Arba galime padaryti tą patį meniu aprašydami klase, ir sukurdami jos tipo objektą.
  class Meniu {

  function Meniu($session) {
  if (isset($session) && $session->logged_in) {
  $path = "";
  if (isset($_SESSION['path'])) {
  $path = $_SESSION['path'];
  unset($_SESSION['path']);
  }
  ?>
  <table width=100% border="0" cellspacing="1" cellpadding="3" class="meniu">
  <?php
  echo "<tr><td>";
  echo "Prisijungęs vartotojas: <b>$session->username</b> <br>";
  echo "</td></tr><tr><td>";
  echo "[<a href=\"" . $path . "userinfo.php?user=$session->username\">Mano paskyra</a>] &nbsp;&nbsp;"
  . "[<a href=\"" . $path . "useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;"
  . "[<a href=\"" . $path . "operacija1.php\">Demo operacija1</a>] &nbsp;&nbsp;"
  . "[<a href=\"" . $path . "operacija2.php\">Demo operacija2</a>] &nbsp;&nbsp;";
  //Trečia operacija rodoma valdytojui ir administratoriui
  if ($session->isManager() || $session->isAdmin()) {
  echo "[<a href=\"" . $path . "operacija3.php\">Demo operacija3</a>] &nbsp;&nbsp;";
  }
  //Administratoriaus sąsaja rodoma tik administratoriui
  if ($session->isAdmin()) {
  echo "[<a href=\"" . $path . "admin/admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
  }
  echo "[<a href=\"" . $path . "process.php\">Atsijungti</a>]";
  echo "</td></tr>";
  ?>
  </table>
  <?php
  }
  }

  }

  //Sukuriamas objektas
  if (isset($session)) {
  $meniu = new Meniu($session);
  }
 */
?>
