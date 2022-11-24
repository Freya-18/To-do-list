<!DOCTYPE html>
<html lang="fr">
<?php
// on vérifie les données provenant du modèle
if (isset($dataVue)) //tableau contenant les informations à afficher
?>


<?php
if (isset($dataVueEreur) && count($dataVueEreur)>0) {
echo "<h2>ERREUR !!!!!</h2>";
foreach ($dataVueEreur as $value){
echo $value;
}}
?>
<h2>Personne - formulaire</h2><hr>
<!-- affichage des données provenant du modèle, juste pour exemple ici-->
<?= $dataVue['data'] ?>
24
Resp: S. SALVA IUT 2ème année GI IUT d’aubiere
Donne ici l’action du 
contrôleur
<form method="post" >
<table> <tr>
<td>Nom</td>
<td><input name="txtNom" value="<?= $dataVue['nom'] ?>" type="text" size="20"></td>
</tr>
<tr><td>Age</td>
<td><input name="txtAge" value="<?= $dataVue['age'] ?>" type="text" size="3"></td>
</tr><tr></table>
<table> <tr>
<td><input type="submit" value="Envoyer"></td>
<!-- action !!!!!!!!!! -->
<input type="hidden" name="action" value="validationFormulaire">
</form>
