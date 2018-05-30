<?php

require("auth/EtreAuthentifie.php");

$title = 'Accueil';
$role=$idm->getRole();
if($role == 'vendeur'){
include("header.php");
}else{
	include("headerclient.php");
}

echo " BONJOUR  " . $idm->getIdentity()."<br/>";
echo " MON NUMERO D'IDENTIFICATION EST  : ". $idm->getUid()."<br/>";
echo " JE SUIS UN ".$idm->getRole()."<br/> ";
echo "<br/>";

?>



<?php
//echo "Escaped values: ".$e_($ci->idm->getIdentity());
include("footer.php");