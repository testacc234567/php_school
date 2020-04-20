<?php
function qry($benutzer, $produkt) {
  $mysqli = new mysqli('localhost','root','','shop');
  if ($mysqli->connect_error) {
  echo "Fehler bei der Verbindung:". msqli_connect_error();
  exit();
  }
  else {
  //echo "Verbunden<br>";
  }
  $query = "SELECT $produkt FROM einkauf WHERE e_benutzer = ?";
if($stmt = $mysqli->prepare($query)){
   $stmt->bind_param('s', $benutzer);
   $stmt->execute();
   $stmt->store_result();
   $stmt->bind_result($e_p1);
   while ($stmt->fetch()) {
   }
   $stmt->free_result();
   $stmt->close();
   }
   $query2 = "SELECT p_long FROM produkte WHERE p_short = ?";
 if($stmt = $mysqli->prepare($query2)){
    $stmt->bind_param('s', $produkt);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($p_name);
    while ($stmt->fetch()) {
    }
    $stmt->free_result();
    $stmt->close();
    }
   if ($e_p1>0) {
   echo "<tr>";
   echo "<td>";
   echo "$p_name";
   echo "</td>";
   echo "<td>";
   echo "$e_p1";
   echo "</td>";
   echo "</tr>";
}
}
function clear($benutzer) {
  $mysqli = new mysqli('localhost','root','','shop');
  if ($mysqli->connect_error) {
  echo "Fehler bei der Verbindung:". msqli_connect_error();
  exit();
  }
  else {
  //echo "Verbunden<br>";
  }
  for ($x = 1; $x < 13; $x++) {
      $produkt= "e_p".$x;


$update="UPDATE `einkauf` SET $produkt = 0 WHERE `einkauf`.`e_benutzer` = ?";
if($stmt = $mysqli->prepare($update)){

   $stmt->bind_param("s", $benutzer);


   $stmt->execute();
}
}
header('location:'.$_SERVER['PHP_SELF']);
}
?>
