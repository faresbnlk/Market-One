<!DOCTYPE html>
<html>
 <body>

    <?php 
    require("auth/EtreAuthentifie.php");
    $idm->getIdentity();
    $idm->getUid();
    $role = $idm->getRole();
    if($role == 'vendeur'){
    include("header.php");
    $page_title="ajout un produit";
  
    if(!isset($_POST['nom'])||!isset($_POST['description'])||!isset($_POST['qte'])||!isset($_POST['prix'])||!isset($_POST['uid'])||!isset($_POST['ctid'])){
      include("aj_form.php");
    }else{
      $nom =$_POST['nom']; 
      $description=$_POST['description']; 
      $qte=$_POST['qte'];
      $prix=$_POST['prix'];
      $uid=$_POST['uid'];
      $ctid=$_POST['ctid'];
      
          if($nom==""||$description==""||!is_numeric($qte)||!is_numeric($prix)||!is_numeric($uid)||!is_numeric($ctid)||!$prix>0||!$qte>0||!$uid>0||!$ctid>0){
           include("aj_form.php"); 
           }else{
              require("db_config.php");
              try {
                   $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
                   $db->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                   $SQL="INSERT INTO produits (nom,description,qte,prix,uid,ctid) VALUES('$nom','$description','$qte','$prix','$uid','$ctid')";
                   $st = $db->prepare($SQL);
                   $res = $st->execute(array($nom, $prix, $qte,$uid,$ctid));

                   if (!$res) {
                      echo "Erreur d’ajout";
                   }else{ echo "L'ajout a été effectué ";
                        ?>  <a href="ajout.php" class="btn btn-info" role="button">Revnir a la page precedente  </a><?php
                   }

              $db=null;

              } catch (Exception $e) {
               echo "Erreur SQL:" .$e ->getMessage();
              }

           }

            include("footer.php");
        }
        }else{
          redirect("home.php");
        }?>

   </body>
</html>