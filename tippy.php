<!DOCTYPE HTML>
<html>
<head>
  <style>
    .box {
      margin: 0;
      background: yellow;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%)
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Tip Calculator</h2>
    <form action="tippy.php" method="GET">
      Bill subtotal: $<input type="text" name="bill" value="<?php if(isset($_GET['bill'])) echo $_GET['bill']?>"><br>
      <br />
      Tip percentage: <br /><br />

      <?php
      if(isset($_GET['tip_percent'])) {
        $selected_radio = $_GET['tip_percent'];

        if($selected_radio == .10) {
          $selected10 = "checked";
          $selected15 = "unchecked";
          $selected20 = "unchecked";
        }
        elseif ($selected_radio == .15) {
          $selected10 = "unchecked";
          $selected15 = "checked";
          $selected20 = "unchecked";
        }
        elseif ($selected_radio == .20){
          $selected10 = "unchecked";
          $selected15 = "unchecked";
          $selected20 = "checked";
        }
      }
      else {
          $selected10 = "unchecked";
          $selected15 = "checked";
          $selected20 = "unchecked";
      }
       ?>

      <input type="radio" name="tip_percent" value=".10" <?PHP echo $selected10 ?>> 10%<tab>
      <input type="radio" name="tip_percent" value=".15" <?PHP echo $selected15 ?>> 15%<tab>
      <input type="radio" name="tip_percent" value=".20" <?PHP echo $selected20 ?>> 20%<tab>
        <br /><br />
      <input style="text-align: center" type="submit">

    </form>
    <?php
        if(isset($_GET['bill']) && isset($_GET["tip_percent"])) {
          $bill_amount = $_GET['bill'];
          $tip_amount = $_GET['tip_percent'];

          if (is_numeric($bill_amount) && $bill_amount > 0 && is_numeric($tip_amount)) {
            $total_tip_amount = (float)$tip_amount * (float)$bill_amount;
            $total = $total_tip_amount + $bill_amount;
          }
          else {
            echo "<br /><span style='color:red'>Please enter the valid number!!!";
          }
        }

        if(isset($total_tip_amount) && isset($total)) {
          echo '<div style="border: 2px solid"> Tip: $'. number_format($total_tip_amount, 2). '<br />';
          echo 'Total: $'. number_format($total, 2). '</div> <br />';
        }
      ?>
    </div>
</body>
</html>
