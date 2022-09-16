<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "RECHERCHER";
    $h1 = "RECHERCHER LE FICHIER CV";
?>

<!-- HEADER -->
<?php
    require_once(__DIR__ ."/Partials/header.php");
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $keyword = @$_GET['recherche'];
        $trtmt=$db->prepare("SELECT * FROM cv WHERE nom like :keyword");
        $trtmt->bindParam(':keyword', $keyword);
        $trtmt->setFetchMode(PDO::FETCH_ASSOC);
        $trtmt->execute();

        $resultats=$trtmt->fetchAll();
    }

?>

<form action="recherche.php" method="get">
    <input style="width:500px; padding:15px;" type="text" name="recherche" placeholder="Faite une recherche a travers le nom" >
    <input type="submit" value="rechercher">
</form>

<table>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EMAIL</th>
            <th>AGE</th>
            <th>NOM DU FICHIER</th>
        </tr>
        <?php foreach($resultats as $form){ ?>
            <tr>
                <td> <?= $form['nom'] ?></td>
                <td> <?= $form['prenom'] ?></td>
                <td> <?= $form['email'] ?></td>
                <td> <?= $form['age'] ?></td>
                <td> <?= $form['cv_nom'] ?></td>
                <td> <a href="./cv_files/<?= $form['cv_nom'] ?>" download>TELECHARGER</a> </td>
                <td> <a href="modifier_formulaire.php?id=<?= $form['id'] ?>">MODIFIER</a> </td>
                <td> <a href="supprimer_formulaire.php?id=<?= $form['id'] ?>">SUPPRIMER</a> </td>
            </tr>
        <?php } ?>
    </table>

<?php

?>


<!-- FOOTER -->
<?php
    require_once(__DIR__ ."/Partials/footer.php");
?>
