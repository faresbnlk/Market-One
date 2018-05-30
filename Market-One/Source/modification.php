<?php
include("header.php");
$page_title="Modifier un produit";
   if(!isset($_GET["pid"])){
  echo "<p>Erreur du pid </p>\n";
  }else{
  $pid= $_GET['pid'];
  try{
  require("db_config.php");
 $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $SQL="SELECT nom,description,qte,prix FROM produits WHERE pid=?";
   $st=$db->prepare($SQL);
   $st->execute([$pid]);
   if($st->rowCount()==0){
    echo"<p>Erreur dans pid </p>\n";

   }else if(!isset($_POST['nom'])||!isset($_POST['description'])||!isset($_POST['qte'])||!isset($_POST['prix'])){
    $v = $st->fetch();
   	$nom =$v['nom'];
   	$description=$v['description'];
   	$qte=$v['qte'];
    $prix=$v['prix'];
    include("mod_form.php");
   }else{
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $qte=$_POST['qte'];
    $prix=$_POST['prix'];

    if($nom==""||$description==""||!is_numeric($qte)||!is_numeric($prix)){
      include("mod_form.php");
    }else{
      $pid= $_GET['pid'];
      $SQL="UPDATE produits SET nom=?,description=?,qte=?,prix=? WHERE pid=?";
      $st=$db->prepare($SQL);
      $res=$st->execute(array($nom,$description,$qte,$prix,$pid));
      if(!$res){
        echo "<P> Erreur de mondification </p>";
      }
      else{ echo "<p> La mondification a ete effectuer  </p>";
       ?><a href="Modifier.php" class="btn btn-info" role="button">Revnir a  la page d'accueil </a><?php
    }
    }

   }
   $db=null;
  }catch(PDOExecption $e){
    echo "Erreur SQL:".$e->getMessage();
  }
}
  include("footer.php");

?>