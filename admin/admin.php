<?php
include("../include/session.php");

//Iš pradžių aprašomos funkcijos, po to jos naudojamos.

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers() {
    global $database;
    $q = "SELECT prisijungimas,lygis,epastas,trukme "
            . "FROM " . TBL_USERS . " ORDER BY lygis DESC,prisijungimas";
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
    echo "<tr><td><b>Vartotojo vardas</b></td><td><b>Lygis</b></td><td><b>E-paštas</b></td><td><b>Paskutinį kartą aktyvus</b></td><td><b>Veiksmai</b></td></tr>\n";
    for ($i = 0; $i < $num_rows; $i++) {
        $uid =
        $uname = mysqli_result($result, $i, "prisijungimas");
        $ulevel = mysqli_result($result, $i, "lygis");
        $ulevelname = '';
        switch ($ulevel)
        {
            case ADMIN_LEVEL:
                $ulevelname = ADMIN_NAME;
                break;
            case MANAGER_LEVEL:
                $ulevelname = MANAGER_NAME;
                break;
            case USER_LEVEL:
                $ulevelname = USER_NAME;
                break;
            default :
                $ulevelname = 'Neegzistuojantis tipas';
        }

        $email = mysqli_result($result, $i, "epastas");
        $time = date("Y-m-d G:i", mysqli_result($result, $i, "trukme"));
        $ulevelchange = '<form action="adminprocess.php" method="POST">

                                <input type="hidden" name="upduser" value="'.$uname.'">
                                <input type="hidden" name="subupdlevel" value="1">
                                <select name="updlevel" onChange="alert(\'Pakeistas vartotojo lygis!\');submit();">
                                    <option value="'.USER_LEVEL.'" '.($ulevel == USER_LEVEL? 'selected':'').'>'.USER_NAME.'</option>
                                    <option value="'.MANAGER_LEVEL.'" '.($ulevel == MANAGER_LEVEL? 'selected':'').'>'.MANAGER_NAME.'</option>
                                    <option value="'.ADMIN_LEVEL.'" '.($ulevel == ADMIN_LEVEL? 'selected':'').'>'.ADMIN_NAME.'</option>
                                </select>


                    </form>';
        echo "<tr><td>$uname</td><td>$ulevelchange</td><td>$email</td><td>$time</td><td><a href='AdminProcess.php?b=1&banuser=$uname' onclick='return confirm(\"Ar tikrai norite blokuoti?\");'>Blokuoti</a> | <a href='AdminProcess.php?d=1&deluser=$uname' onclick='return confirm(\"Ar tikrai norite trinti?\");'>Trinti</a></td></tr>\n";
    }
    echo "</table><br>\n";
}

function mysqli_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}
/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers() {
    global $database;
    $q = "SELECT prisijungimas,trukme "
            . "FROM " . TBL_BANNED_USERS . " ORDER BY prisijungimas";
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
    echo "<tr><td><b>Vartotojo vardas</b></td><td><b>Blokavimo laikas</b></td><td><b>Veiksmai</b></td></tr>\n";
    for ($i = 0; $i < $num_rows; $i++) {
        $uname = mysqli_result($result, $i, "prisijungimas");
        $time = date("Y-m-d G:i", mysqli_result($result, $i, "trukme"));
        echo "<tr><td>$uname</td><td>$time</td><td><a href='AdminProcess.php?db=1&delbanuser=$uname' onclick='return confirm(\"Ar tikrai norite Šalinti?\");'>Šalinti</a></td></tr>\n";
    }
    echo "</table><br>\n";
}

function ViewActiveUsers() {
    global $database;
    if (!defined('TBL_ACTIVE_USERS')) {
        die("");
    }
    $q = "SELECT ip FROM " . TBL_ACTIVE_USERS
            . " ORDER BY trukme DESC,ip";
    $result = $database->query($q);
    /* Error occurred, return given name by default */
    $num_rows = mysqli_num_rows($result);
    if (!$result || ($num_rows < 0)) {
        echo "Error displaying info";
    } else if ($num_rows > 0) {
        /* Display active users, with link to their info */
        echo "<br><table border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
        echo "<tr><td><b>Vartotojų vardai</b></td></tr>";
        echo "<tr><td><font size=\"2\">\n";
        for ($i = 0; $i < $num_rows; $i++) {
            $uname = mysqli_result($result, $i, "ip");
            if ($i > 0)
                echo ", ";
            echo "<a href=\"../userinfo.php?user=$uname\">$uname</a>";
        }
        echo ".";
        echo "</font></td></tr></table>";
    }
}

if (!$session->isAdmin()) {
    header("Location: ../index.php");
} else { //Jei administratorius
    ?>
    <html>
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
            <title>Administratoriaus sąsaja</title>
            <link href="../include/styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <table class="center"><tr><td>
                        <img src="../pictures/top.png"/>
                    </td></tr><tr><td>
                        <?php
                        $_SESSION['path'] = '../';
                        include("../include/meniu.php");
                        //Nuoroda į pradžią
                        ?>
                        <table style="border-width: 2px; border-style: dotted;"><tr><td>
                                    Atgal į [<a href="../index.php">Pradžia</a>]
                                </td></tr></table>
                        <br>
                        <?php
                        if ($form->num_errors > 0) {
                            echo "<font size=\"4\" color=\"#ff0000\">"
                            . "!*** Error with request, please fix</font><br><br>";
                        }
                        ?>
                        <table style=" text-align:left;" border="0" cellspacing="5" cellpadding="5">
                            <tr><td>
                                    <?php
                                    /**
                                     * Display Users Table
                                     */
                                    ?>
                                    <h3>Sistemos vartotojai:</h3>
                                    <?php
                                    displayUsers();
                                    ?>
                                    <br>
                                </td>
                            </tr>
                            <tr><td><hr></td></tr>
        <tr><td>
                <?php
                /**
                 * Display Banned Users Table
                 */
                ?>
                <h3>Blokuoti vartotojai:</h3>
                <?php
                displayBannedUsers();
                ?>

            </td></tr>
                            <tr><td><hr></td></tr>
                    </td></tr>

                <tr><td>
                        <h3>Šiuo metu prisijungę vartotojai:</h3>
                        <?php
                        ViewActiveUsers();
                        ?>
                <tr><td><hr></td></tr>
            </td></tr>
        <tr>
            <td>
                <?php
                /**
                 * Delete Inactive Users
                 */
                ?>
                <h3>Šalinti neaktyvius vartotojus</h3>
                <table>
                    <form action="adminprocess.php" method="POST">
                        <tr><td>
                                Neaktyvumo dienos:<br>
                                <select name="inactdays">
                                    <option value="3">3
                                    <option value="7">7
                                    <option value="14">14
                                    <option value="30">30
                                    <option value="100">100
                                    <option value="365">365
                                </select>
                            </td>
                            <td>
                                <br>
                                <input type="hidden" name="subdelinact" value="1">
                                <input type="submit" value="Šalinti">
                            </td>
                    </form>
                </table>
            </td>
        </tr>

    </table>
    </td></tr>
    <?php
    echo "<tr><td>";
    include("../include/footer.php");
    echo "</td></tr>";
    ?>
    </table>
    </body>
    </html>
    <?php
}
?>
