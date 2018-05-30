<?php 
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$idm->getUid();
$role = $idm->getRole();
if($role == 'vendeur'){
include("header.php");
$page_title="Suppresion produits";
if(!isset($_GET["pid"])){
  	echo '<script>alert("erreur de supression");</script>';

}else if(!isset($_POST["supprimer"])&&!isset($_POST["annuler"])){
	
  include("del_form.php");
}else if(isset($_POST["annuler"])){
  ?> <a href="Supprimer.php"" class="btn btn-info" role="button">Revnir à la page Supprimer </a><?php
}else{
require("db_config.php");
$pid= $_GET['pid'];
//supression
try{

 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "DELETE FROM produits WHERE pid=?";
 $st=$db->prepare($SQL);
 $st->execute([$pid]);
 if(!$st){
  echo "<p>Erreur de suppresion<p>\n";
}
  else{ echo "<p> La suppression a était effectuée </p>";
  ?> <a href="Supprimer.php"" class="btn btn-info" role="button">Revnir à la page Supprimer </a><?php
}

$db=null;
}catch(PDOException $e){
  echo "Erreur SQL :" .$e->getMessage();
}
}
include("footer.php");
}else{
	redirect("home.php");
}
?>