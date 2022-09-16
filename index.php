<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "Home";
    $h1 = "LISTE DES CV UPLAODER";
?>

<!-- HEADER -->
<?php
    require_once(__DIR__ ."/Partials/header.php");
?>

<?php
    $stmt = $db->prepare('SELECT * FROM cv');
    $stmt->execute();
    $resultats = $stmt->fetchall(PDO::FETCH_ASSOC);
    //var_dump($resultats);
?>

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

<!-- FOOTER -->
<?php
    require_once(__DIR__ ."/Partials/footer.php");
?>

