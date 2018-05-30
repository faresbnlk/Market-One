
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

  <title>la liste des  produits</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  </head>
  <body>


<?php include("headerclient.php");?>
<div class="container">
  <h2>la liste des  produits </h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix</th>
      </tr>
    </thead>
<?php if(!isset($_GET['nom'])){
   echo "<P> ce produit n'exite pas</p>  ";
}else{
require("db_config.php");
try {
 $nom=$_GET['nom'];
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT pid,nom,description,qte,prix FROM produits  WHERE  nom=? ";
 $st=$db->prepare($SQL);
 $st->execute([$nom]);
  if($st->rowCount()==0)
   echo "<P> cette categorie de produits n'exite pas";
   else {
   while ($row=$st->fetch()) {
    ?>
    <tbody>
      <tr>
       <td><?php echo htmlspecialchars($row['nom'])?></td>
       <td><?php echo htmlspecialchars($row['description'])?></td>
        <?php if($row['qte']==0){?>
      <td><?php echo 'épuisé'?></td>
      <?php }else{?>
       <td><?php echo $row['qte']?></td>
     <?php } ?>
       <td><?php echo $row['prix'] ,'' ,'€'?></td>
       <?php if($row['qte']==0){?>
       <td><?php echo 'indisponible'?></td>
      <?php }else{?>
       <td><?php echo "<a href='commande.php?pid=$row[pid]'>ajoute au panier</a>"?></td>
     <?php } ?>
      </tr>
    </tbody>
   <?php };
    }

$db=null;
 
} catch (Exception $e) {
 echo "Erreur SQL:".$e->getMessage(); 
}
include("footer.php");
}
}else{
  redirect("home.php");
}
?>
  </table>
</div>

</body>

</html>

