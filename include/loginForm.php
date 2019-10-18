<?php
if (isset($form) && isset($session) && !$session->logged_in) {
    ?>   
    <form action="process.php" method="POST" class="login">              
        <center style="font-size:18pt;"><b>Prisijungimas</b></label></center>
        <p style="text-align:left;">Vartotojo vardas:<br>
            <input class ="s1" name="user" type="text" value="<?php echo $form->value("user"); ?>"/><br>
            <?php echo $form->error("user"); ?>
        </p>
        <p style="text-align:left;">Slaptažodis:<br>
            <input class ="s1" name="pass" type="password" value="<?php echo $form->value("pass"); ?>"/><br>
            <?php echo $form->error("pass"); ?>
        </p>  
        <p style="text-align:left;">
            <input type="submit" value="Prisijungti"/>
            <input type="checkbox" name="remember" 
            <?php
            if ($form->value("remember") != "") {
                echo "Pažymėtas";
            }
            ?>/>
            Atsiminti   
        </p>
        <input type="hidden" name="sublogin" value="1"/>
        <p>
            <a href="forgotpass.php">Negalite prisijungti?</a>&nbsp;&nbsp;            
            <a href="register.php">Registracija</a>
        </p>     
    </form>
    <?php
}
?>