
<!DOCTYPE html>
<html>
<head>
<?php
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$idm->getUid();
$role = $idm->getRole();
?>
<?php if($role == 'acheteur'){?>

  <title>liste par categorie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  </head>
  <body>


<?php include("header.php");?>
<div class="container">
  <h2>le détail de la commande</h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix total</th>
      </tr>
    </thead>
<?php if(!isset($_GET['pid'])){
   echo "<P> fail";
}else if(!isset($_GET['qte'])){
  echo "fail qte";
}else{
 require("db_config.php");
 try {
 $pid=$_GET['pid'];
 $qte=$_GET['qte'];
$db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT produits.nom,produits.description,produits.prix FROM produits INNER JOIN commande ON  produits.pid=commande.pid WHERE commande.pid=?";
 $st=$db->prepare($SQL);
 $st->execute([$pid]);
  if($st->rowCount()==0)
   echo "<P> cette categorie de produits n'exite plus";
   else {
    $row=$st->fetch();
    ?>
    <tbody>
      <tr>
       <td><?php echo htmlspecialchars($row['nom'])?></td>
       <td><?php echo htmlspecialchars($row['description'])?></td>
       <td><?php echo "$qte"?></td> 
       <?php $prix=$qte*$row['prix'];?>
       <td><?php echo "$prix €"?></td>
      </tr>
    </tbody>
   <?php 
    }

$db=null;
 
} catch (Exception $e) {
 echo "Erreur SQL:".$e->getMessage(); 
}
?><a href='javascript:history.go(-1)'>Revenir a la page precedent </a> <?php

}


?></div><?php

}else{
  redirect("home.php");
}
?>
  </table>


</body>

</html>

