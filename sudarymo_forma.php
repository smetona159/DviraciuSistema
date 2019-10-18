<?php
if (isset($form) && isset($session) && $session->logged_in) {

  function getBalnas(){
      global $database;
      $q = "SELECT * ". "FROM balnas";
      $result = $database->query($q);
      $num_rows = mysqli_num_rows($result);
      for ($i = 0; $i < $num_rows; $i++)
          {
           $balnoID = mysqli_result($result, $i, "balno_id");
           $balnoName = mysqli_result($result, $i, "balno_reiksme");
           $balnoKiekis = mysqli_result($result, $i, "balno_kiekis");
           $balnoKaina = mysqli_result($result, $i, "balno_kaina");
           if($balnoKiekis>0){
             echo"<option value=\"$balnoID\">$balnoID, $balnoName, $balnoKiekis, $balnoKaina €</option>";
           }
         }
       }
       function getPadangos(){
         global $database;
         $q = "SELECT * ". "FROM padangos";
         $result = $database->query($q);
         $num_rows = mysqli_num_rows($result);
         for ($i = 0; $i < $num_rows; $i++)
         {
           $padanguID = mysqli_result($result, $i, "padangu_id");
           $padanguName = mysqli_result($result, $i, "padangu_reiksme");
           $padanguKiekis = mysqli_result($result, $i, "padangu_kiekis");
           $padanguKaina = mysqli_result($result, $i, "padangu_kaina");
           if($padanguKiekis>0){
             echo"<option value=\"$padanguID\">$padanguID, $padanguName, $padanguKiekis, $padanguKaina €</option>";
           }
         }
       }
       function getPedalai(){
         global $database;
         $q = "SELECT * ". "FROM pedalai";
         $result = $database->query($q);
         $num_rows = mysqli_num_rows($result);
         for ($i = 0; $i < $num_rows; $i++)
         {
           $pedaluID = mysqli_result($result, $i, "pedalu_id");
           $pedaluName = mysqli_result($result, $i, "pedalu_reiksme");
           $pedaluKiekis = mysqli_result($result, $i, "pedalu_kiekis");
           $pedaluKaina = mysqli_result($result, $i, "pedalu_kaina");
           if($pedaluKiekis>0){
             echo"<option value=\"$pedaluID\">$pedaluID, $pedaluName, $pedaluKiekis, $pedaluKaina €</option>";
           }
         }
       }
       function getRatai(){
         global $database;
         $q = "SELECT * ". "FROM ratu_komplektas";
         $result = $database->query($q);
         $num_rows = mysqli_num_rows($result);
         for ($i = 0; $i < $num_rows; $i++)
         {
           $ratoID = mysqli_result($result, $i, "rato_id");
           $ratoName = mysqli_result($result, $i, "rato_reiksme");
           $ratoKiekis = mysqli_result($result, $i, "rato_kiekis");
           $ratoKaina = mysqli_result($result, $i, "rato_kaina");
           if($ratoKiekis>0){
             echo"<option value=\"$ratoID\">$ratoID, $ratoName, $ratoKiekis, $ratoKaina €</option>";
           }
         }
       }
       function getRemas(){
         global $database;
         $q = "SELECT * ". "FROM remas";
         $result = $database->query($q);
         $num_rows = mysqli_num_rows($result);
         for ($i = 0; $i < $num_rows; $i++)
         {
           $remoID = mysqli_result($result, $i, "remo_id");
           $remoName = mysqli_result($result, $i, "remo_reiksme");
           $remoKiekis = mysqli_result($result, $i, "remo_kiekis");
           $remoKaina = mysqli_result($result, $i, "remo_kaina");
           if($remoKiekis>0){
             echo"<option value=\"$remoID\">$remoID, $remoName, $remoKiekis, $remoKaina €</option>";
           }
         }
       }
       function getStabdziai(){
         global $database;
         $q = "SELECT * ". "FROM stabdziai";
         $result = $database->query($q);
         $num_rows = mysqli_num_rows($result);
         for ($i = 0; $i < $num_rows; $i++)
         {
           $stabdziuID = mysqli_result($result, $i, "stabdziu_id");
           $stabdziuName = mysqli_result($result, $i, "stabdziu_reiksme");
           $stabdziuKiekis = mysqli_result($result, $i, "stabdziu_kiekis");
           $stabdziuKaina = mysqli_result($result, $i, "stabdziu_kaina");
           if($stabdziuKiekis>0){
             echo"<option value=\"$stabdziuID\">$stabdziuID, $stabdziuName, $stabdziuKiekis, $stabdziuKaina €</option>";
           }
         }
       }
?>

      <form method="POST"  action="procesai.php" method="sudarymo_forma.php">
        <div class="lauku_forma">
          <label>Pasirinkite balną:</label>
          <select type="text" name="balnas_id" text-align="right">
            <option value=""></option>
            <?php getBalnas(); ?>
          </select>
        </div>
          <br>
          <div class="lauku_forma">
          <label>Pasirinkite padangas:</label>
          <select type="text" name="padangu_id" text-align="right">
            <option value=""></option>
            <?php getPadangos(); ?>
          </select>
        </div>
          <br>
          <div class="lauku_forma">
          <label>Pasirinkite pėdalus:</label>
          <select type="text" name="pedalu_id" text-align="right">
            <option value=""></option>
            <?php getPedalai(); ?>
          </select>
        </div>
          <br>
          <div class="lauku_forma">
          <label>Pasirinkite ratus:</label>
          <select type="text" name="ratu_id" text-align="right">
            <option value=""></option>
            <?php getRatai(); ?>
          </select>
        </div>
          <br>
          <div class="lauku_forma">
          <label>Pasirinkite rėmą:</label>
          <select type="text" name="remo_id" text-align="right">
            <option value=""></option>
            <?php getRemas(); ?>
          </select>
        </div>
          <br>
          <div class="lauku_forma">
          <label>Pasirinkite stabdžius:</label>
          <select type="text" name="stabdziu_id" text-align="right">
            <option value=""></option>
            <?php getStabdziai();?>
          </select>
          <?php echo $form->error("sukurti");?>
        </div>
          <br>



        <input type="hidden" name="sukurti" value="1"/>
      <button type="submit" name="sukurti"  class="registerbtn">Registruoti</button>

</form>
<?php } ?>
