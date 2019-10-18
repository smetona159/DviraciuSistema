<?php
include("include/session.php");
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
            <title>Sudarymas</title>
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
                        include("sudarymo_forma.php");
                        
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
