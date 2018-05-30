
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

  <title>les commandes des clients </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  </head>
  <body>


<?php include("header.php");?>
<div class="container">
  <h2>la liste des commandes passées</h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>cmdid</th>
        <th>qte</th>
        <th>date</th>
        <th>statut</th>
        <th>modification</th>
      </tr>
    </thead>
   <?php  require("db_config.php");
try {
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT * FROM commande ";
  $res=$db->query($SQL);
  if($res->rowCount()==0)
   echo "<P>la liste est vide";
   else {
   while ($row=$res->fetch()) {
                          ?>
    <tbody>
      <tr>
       <td><?php echo htmlspecialchars($row['cmdid'])?></td>
       <td><?php echo htmlspecialchars($row['qte'])?></td>
       <td><?php echo $row['date']?></td>
       <td><?php echo $row['statut']?> </td>
       <td><a class="btn btn-success" href="commande_statut.php?cmdid=<?php echo $row['cmdid']?>"> Modifier  </a> </td>
       <td><a class="btn btn-info" href="detail.php?pid=<?php echo $row['pid']?> & qte=<?php echo $row['qte']?>">Detail</a> </td>
      </tr>
    </tbody>
   <?php };
   echo "</table>";
    }

$db=null;
 
} catch (Exception $e) {
 echo "Erreur SQL:".$e->getMessage(); 
}

}else{
  redirect("home.php");
}

?>
  </table>
  <?php 
  include("footer.php");
   ?>
</div>

</body>

</html>