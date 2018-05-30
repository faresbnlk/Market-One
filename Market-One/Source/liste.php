
<!DOCTYPE html>
<html>
<head>
<?php
require("auth/EtreAuthentifie.php");
$idm->getIdentity();
$idm->getUid();
$role = $idm->getRole();
?>
<?php if($role == 'vendeur'){?>

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
  <h2>la liste des produits </h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Déscription</th>
        <th>Quantité</th>
        <th>Prix en €</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
<?php if(!isset($_GET['ctid'])){
   echo "<P> fail";
}else{
require("db_config.php");
try {
 $ctid=$_GET['ctid'];
$db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT produits.pid,produits.nom,produits.description,produits.qte,produits.prix FROM produits INNER JOIN categories ON  produits.ctid=categories.ctid WHERE categories.ctid=?";
 $st=$db->prepare($SQL);
 $st->execute([$ctid]);
  if($st->rowCount()==0)
   echo "<P> Cette categorie de produits n'existe pas";
   else {
   while ($row=$st->fetch()) {
    ?>
    <tbody>
      <tr>
       <td><?php echo htmlspecialchars($row['nom'])?></td>
       <td><?php echo htmlspecialchars($row['description'])?></td>
        <?php if($row['qte']==0){?>
      <td><?php echo 'épuise'?></td>
      <?php }else{?>
       <td><?php echo $row['qte']?></td>
     <?php } ?>
       <td><?php echo $row['prix'],'€'?></td>
       <td> <a class="btn btn-info" href="modification.php?pid=<?php echo $row['pid']?>"> Modifier</a></td>
       <td><a class="btn btn-danger" href="suppression.php?pid=<?php echo $row['pid']?>"> Supprimer</td>
      </tr>
    </tbody>
   <?php };
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

