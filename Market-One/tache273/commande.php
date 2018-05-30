<?php
include("headerclient.php");
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$uid=$idm->getUid();
$role=$idm->getRole();
if($role=='acheteur'){
$page_title="commande des produit";
   if(!isset($_GET["pid"])){
   echo "<p>Erreur du pid </p>\n";
    }else{
   $pid= $_GET['pid'];
   try{
   require("db_config.php");
     $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $date =date('Y-m-d H:i:s') ;
     $qte=1;
     $SQL="INSERT INTO commande (pid,uid,qte,date) VALUES($pid,$uid,$qte,'$date')";
      $st=$db->prepare($SQL);
      $st->execute();
      if($st->rowCount()==0){
      echo"<p>Erreur dans la commande </p>\n";
      }else {
      echo "<p> le produit a était ajouté dans votre panier <a href='javascript:history.go(-1)'>   Revenir a la page precedent </a> ";
      }
   $db=null;
   }catch(PDOExecption $e){
  echo "Erreur SQL:".$e->getMessage();
   }
}
  include("footer.php");
}else{
  redirect("home.php");
}

?>