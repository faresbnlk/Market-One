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

  <title>categoris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  </head>
<body>
<?php 
include("headerclient.php");?>
<div class="container">
  <h2>la liste des categories </h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Action</th>
      </tr>
    </thead>
   <?php  
   require("db_config.php");
 try {
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT * FROM categories";
  $res=$db->query($SQL);
  if($res->rowCount()==0)
   echo "<P>la liste est vide";
   else {
    while ($row=$res->fetch()) {?>
     <tbody>
      <tr>
       <td><?php echo htmlspecialchars($row['nom'])?></td>
        <td><a class="btn btn-info" href="listecleint.php?ctid=<?php echo $row['ctid']?>"> affiche </a> </td>
      </tr>
    </tbody>
   <?php };
   echo "</table>";
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
  </table>
 </div>

</body>

</html>
