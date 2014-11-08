<?php
$cd=$_GET['cd'];
echo "<input type='file' name='txtFoto$cd' class='foto' style='margin-bottom:5px;margin-top:5px;' />";
echo "<input name='addfoto' type='button' onClick='addFormFoto(this); return false;' value='+' class='mais'/><br>";
echo "<div id='addfoto$cd' class='campadd'></div>";

?>
