<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "SUPPRESSION";
    $h1 = "SUPPRIMER UN CV";
?>

<!-- HEADER -->
<?php
    require_once(__DIR__ ."/Partials/header.php");
?>


<?php
    $trtmt = $db->prepare("DELETE FROM cv WHERE id=:id");
    $trtmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $trtmt->execute();

    echo "<p class='success'>suppression effectuer avec succes</p>"
?>


<!-- FOOTER -->
<?php
    require_once(__DIR__ ."/Partials/footer.php");
?>
