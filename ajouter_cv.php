<!-- CONSTANTE -->
<?php
    require_once(__DIR__ ."/Partials/constante.php");
    $title = "AJOUTER CV";
    $h1 = "AJOUTER UN CV";
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $file_tmp_name = $_FILES['upload_cv']['tmp_name'];
        $path = "./cv_files/" .$_FILES['upload_cv']['name'];

        $trtmt=$db->prepare("INSERT INTO cv (nom, prenom, email, age, cv_nom, cv_type, cv_taille, cv_bin) VALUES (:nom, :prenom, :email, :age, :cv_nom, :cv_type, :cv_taille, :cv_bin);");
        $trtmt->bindParam(':nom', $_POST['nom']);
        $trtmt->bindParam(':prenom', $_POST['prenom']);
        $trtmt->bindParam(':email',$_POST['email']);
        $trtmt->bindParam(':age',$_POST['age']);
        $trtmt->bindParam(':cv_nom', $_FILES["upload_cv"]["name"]);
        $trtmt->bindParam(':cv_type', $_FILES["upload_cv"]["type"]);
        $trtmt->bindParam(':cv_taille', $_FILES["upload_cv"]["size"]);
        $trtmt->bindParam(':cv_bin', file_get_contents($_FILES["upload_cv"]["tmp_name"]));
        $trtmt->execute();

        move_uploaded_file($file_tmp_name, $path);

        echo "Success";
    }
?>