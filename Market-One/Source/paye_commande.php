
<!DOCTYPE html>
<html>
<head>
<?php
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$idm->getUid();
$role = $idm->getRole();


 if($role == 'acheteur'){

 include("headerclient.php");
 require("db_config.php");
try {
 $uid=$idm->getUid();
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "DELETE FROM commande WHERE uid=?";
 $res=$db->prepare($SQL);
 $res->execute([$uid]);
  //$res=$db->query($SQL);
  if($res->rowCount()==0)
   echo "la liste est vide";
   else {
   ?>
   <div class="jumbotron">
      <h1>Merci pour votre achat, a très bientôt</h1>
   </div>
  <?php 
   }
   
$db=null;
 
} catch (Exception $e) {
 echo "Erreur SQL:".$e->getMessage(); 
}
include("footer.php");
}else{
  redirect("home.php");
}
?>
</body>
</html>