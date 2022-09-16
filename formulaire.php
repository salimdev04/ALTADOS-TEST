<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "AJOUTER";
    $h1 = "AJOUTER UN CV";
?>

<!-- HEADER -->
<?php
    require_once(__DIR__ ."/Partials/header.php");
?>

<form action="ajouter_cv.php" method="post" enctype="multipart/form-data">
    NOM:
    <input type="text" name="nom" value="" id="">
    PRENOM:
    <input type="text" name="prenom" value="" id="">
    EMAIL:
    <input type="email" name="email" value="" id="">
    AGE:
    <input type="number" name="age" value="" id="">
    TELECHARGER CV:
    <input type="file" name="upload_cv" value="" id="" required>
    <input type="submit" value="ENVOYER">
</form>

<!-- FOOTER -->
<?php
    require_once(__DIR__ ."/Partials/footer.php");
?>
