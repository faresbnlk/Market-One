<?php
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$idm->getUid();
$role = $idm->getRole();
if($role == 'vendeur'){
  include("header.php");
  $page_title="status";
  if(!isset($_GET["cmdid"])){
  echo "<p>Erreur du cmdid 1 </p>\n";
  }else{
     $cmdid= $_GET['cmdid'];
    if(!isset($_POST["choix"])){
    include("satut_form.php");
    }else{
      $statut=$_POST['choix'];
      require("db_config.php");
    try{
      $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $SQL="UPDATE commande SET statut=? WHERE cmdid=?";
      $st=$db->prepare($SQL);
      $res=$st->execute(array($statut,$cmdid));
      if(!$res){
        echo "<P> Erreur de mondification </p>";
      }
      else{ echo "<p> La mondification a ete effectuer  </p>";
     ?><a href="commandevenduer.php" class="btn btn-info" role="button">Revnir a  la page de Commande </a><?php
    }
    
   $db=null;
   }catch(PDOExecption $e){
    echo "Erreur SQL:".$e->getMessage();
      }
    }
  }
include("footer.php");
}else{
  redirect("home.php");
}

?>
