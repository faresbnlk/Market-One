
<!DOCTYPE html>
<html>
<body>
<h1>modification du produit</h1>
<table>
<form action="" method="post">
<tr><td>Nom</td><td><input  class="form-control" type="text" name="nom" value="<?php echo $nom?>"/></td></tr>
<tr><td>Description</td><td><input class="form-control"  type="text" name="description" value="<?php echo $description?>"/></td></tr>
<tr><td>Quantité</td><td><input class="form-control"  type="number" name="qte"   value="<?php echo $qte?>" /></td></tr>
<tr><td>Prix</td><td><input class="form-control"  type="number" name="prix"  value="<?php echo $prix ?>" /></td></tr>
 </table>
 <input  class="btn btn-primary" type="submit" name="modifier" value="Modifier">
  <a href="javascript:history.go(-1)" class="btn btn-primary" role="button">Annuler</a>
</form>

</body>
</html>