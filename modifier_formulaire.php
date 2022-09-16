<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "MODIFICATION";
    $h1 = "MODIFIER UN CV";
?>

<!-- HEADER -->
<?php
    require_once(__DIR__ ."/Partials/header.php");
?>


<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $file_tmp_name = $_FILES['upload_cv']['tmp_name'];
        $path = "./cv_files/" .$_FILES['upload_cv']['name'];

        $trtmt=$db->prepare("UPDATE cv SET nom=:nom, prenom=:prenom, email=:email, age=:age, cv_nom=:cv_nom, cv_type=:cv_type, cv_taille=:cv_taille, cv_bin=:cv_bin WHERE id=:id LIMIT 1");
        $trtmt->bindParam(':id', $_POST['id']);
        $trtmt->bindParam(':nom', $_POST['nom']);
        $trtmt->bindParam(':prenom', $_POST['prenom']);
        $trtmt->bindParam(':email', $_POST['email']);
        $trtmt->bindParam(':age', $_POST['age']);
        $trtmt->bindParam(':cv_nom', $_FILES["upload_cv"]["name"]);
        $trtmt->bindParam(':cv_type', $_FILES["upload_cv"]["type"]);
        $trtmt->bindParam(':cv_taille', $_FILES["upload_cv"]["size"]);
        $trtmt->bindParam(':cv_bin', file_get_contents($_FILES["upload_cv"]["tmp_name"]));

        $trtmt->execute();
        move_uploaded_file($file_tmp_name, $path);

        echo "<p class='success'>Modification effectuer avec succes</p>";
    } else {
        $trtmt=$db->prepare("SELECT * FROM cv WHERE id=:id");
        $trtmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
        $trtmt->execute();
    
        $resultats = $trtmt->fetch();
    };
?>


<form action="modifier_formulaire.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
    NOM:
    <input type="text" name="nom" value="<?= @$resultats['nom'] ?>" id="">
    PRENOM:
    <input type="text" name="prenom" value="<?= @$resultats['prenom'] ?>" id="">
    EMAIL:
    <input type="email" name="email" value="<?= @$resultats['email'] ?>" id="">
    AGE:
    <input type="number" name="age" value="<?= @$resultats['age'] ?>" id="">
    TELECHARGER CV:
    <input type="file" name="upload_cv" value="<?= @$resultats['cv_nom'] ?>" id="" required>
    <input type="submit" value="ENVOYER">
</form>

<!-- FOOTER -->
<?php
    require_once(__DIR__ ."/Partials/footer.php");
?>
