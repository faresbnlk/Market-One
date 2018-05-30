<!DOCTYPE html>
<html>
<body>
<?php
$title="Ajout des produits";
include("header.php");
?>
<p class="error"><?= $error??""?></p>
<div class="container">
 <div class="row">
 <div class="col-md-4 col-md-offset-4">
   <div class="center">
    <h1>Informations</h1>
    <form method="post">
                    <!--legend>Inscription</legend-->
        <table>
                    <tr>
                        <td><label for="inputNom" class="control-label">Nom</label></td>
                         <td><input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required value="<?= $data['nom']??""?>">
                         </td>
                    </tr>
                    <tr>
                       <td> <label for="inputDescription" class="control-label">description</label></td>
                          <td>  <input type="text" name="description" class="form-control" id="inputDescription" placeholder="la description" required aria-required="true" value="<?= $data['description']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputQte" class="control-label">qte</label></td>
                            <td><input type="number" name="qte" class="form-control" id="inputQte" placeholder=" la quantité " required value="<?= $data['qte']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputPrix" class="control-label">prix</label></td>
                            <td><input type="number" name="prix" class="form-control" id="inputPrix" placeholder="prix" required value=""></td>
                    </tr>
                  
                    <tr>
                        <td><label for="inputctid" class="control-label">ctid</label></td>
                            <td><input type="number" name="ctid" class="form-control" id="inputctid" placeholder=" numero de catégorie" required value=""></td>
                    </tr>
        </table>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="listeparcategorie.php" class="btn btn-primary" role="button">Annuler</a>
                    </div>
       </form>
    </div>
  </div>
  </div>
</div>
<?php
include("footer.php");


