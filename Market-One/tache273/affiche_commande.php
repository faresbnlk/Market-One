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

    <title>commande</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/lib/bootstrap.min.css">
    <script src="/lib/jquery-1.12.2.min.js"></script>
    <script src="/lib/bootstrap.min.js"></script>
</head>
 <body>
   <?php include("headerclient.php");?>
   <div class="container">
    <h2>Mes commandes </h2>           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>cmdid</th>
            <th>qte</th>
            <th>date</th>
            <th>statut</th>
            <th>détail</th>
         </tr>
       </thead>
   <?php  require("db_config.php");
   try {
          $uid=$idm->getUid();
          $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
          $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $SQL = "SELECT * FROM commande WHERE uid=?";
          $res=$db->prepare($SQL);
          $res->execute([$uid]);
            //$res=$db->query($SQL);
           if($res->rowCount()==0)
           echo "<P>La liste est vide, ajoutez vos produits";
           else {
           while ($row=$res->fetch()) {
                 ?><tbody>
                    <tr>
                     <td><?php echo htmlspecialchars($row['cmdid'])?></td>
                     <td><?php echo htmlspecialchars($row['qte'])?></td>
                     <td><?php echo htmlspecialchars( $row['date'])?></td>
                     <td><?php echo htmlspecialchars($row['statut'])?></td>
                     <td><a class="btn btn-info" href="detailcleint.php?pid=<?php echo $row['pid']?> & qte=<?php echo $row['qte']?>">Detail</a> </td>
                    </tr>
                   </tbody><?php
                   };
               echo "</table>";
               $sommef = 0;
               foreach ($db->query("SELECT * FROM produits" ) as $somme) {
                  $sommef = $somme['prix'] + $sommef;
               }
               ?><button type="button" class="btn btn-info"><?php echo $sommef; ?></button>
               <a href="paye_commande.php" class="btn btn-success" role="button">Payer</a><?php
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
   </div>

   <?php 
     include("footer.php");
   ?>
   
 </body>
</html>