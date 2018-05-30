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

  <title>Modifer un produit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  </head>
  <body>


<?php include("header.php");?>
<div class="container">
  <h2>tous les produits </h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix en €</th>
      </tr>
    </thead>
   <?php  require("db_config.php");
try {
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT * FROM produits";
  $res=$db->query($SQL);
  if($res->rowCount()==0)
   echo "<P>la liste est vide";
   else {
   while ($row=$res->fetch()) {
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
       <td><?php echo $row['prix'] ,'€'?></td>
       <td> <a class="btn btn-info" href="modification.php?pid=<?php echo $row['pid']?>"> Modifier</a></td>
      </tr>
    </tbody>
   <?php };
   echo "</table>";
    }

$db=null;
 
} catch (Exception $e) {
 echo "Erreur SQL:".$e->getMessage(); 
}
include 'footer.php';
}else{
  redirect("home.php");
}

?>
  </table>
</div>

</body>

</html>