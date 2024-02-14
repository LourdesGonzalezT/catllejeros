<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["btneditCat"])) {
    $cat_Id = $_POST['catId'];
    $image1_path = $_POST['image1_path'];
    $catName = $_POST["catName"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $aboutCat = $_POST["aboutCat"];
    
    // Variables que hacen referencia a las imagenes
    $image1 = $_FILES["image1"]["tmp_name"];
    $img1Name = $_FILES["image1"]["name"];
    $img1Type = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));
    $img1Directory = "images/catsImages/";

    $image2 = $_FILES["image2"]["tmp_name"];
    $img2Name = $_FILES["image2"]["name"];
    $img2Type = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));
    $img2Directory = "images/catsImages/";

    // Verificar si se han proporcionado imágenes y si ambos tipos de archivo de imagen son válidos
    if (
        (empty($img1Name) || ($img1Type == "jpg" || $img1Type == "jpeg" || $img1Type == "png" || $img1Type == "webp")) && 
        (empty($img2Name) || ($img2Type == "jpg" || $img2Type == "jpeg" || $img2Type == "png" || $img2Type == "webp"))
    ) {
            
        // Almacenar las imágenes en el directorio correspondiente solo si se han proporcionado
        $new_catImg1Path = !empty($img1Name) ? ($img1Directory . $cat_Id . '-'. $img1Name) : $image1_path;
        $new_catImg2Path = !empty($img2Name) ? ($img2Directory . $cat_Id . '-'. $img2Name) : $image2_path;

        // Mover las imágenes al directorio correspondiente solo si se han proporcionado
        if (
            (empty($img1Name) || move_uploaded_file($image1, $new_catImg1Path)) &&
            (empty($img2Name) || move_uploaded_file($image2, $new_catImg2Path))
        ) {
            // Actualizar la base de datos con las rutas de las imágenes
            $edit = $connection->query("UPDATE cats SET catName='$catName', age = '$age', sex='$sex', aboutCat='$aboutCat', image1_path='$new_catImg1Path', image2_path='$new_catImg2Path' WHERE catId='$cat_Id' ");

            if ($edit == 1) {
                echo "<div id='mensaje' class='alert alert-success'>¡Gato modificado con éxito!</div>";
                header("Location: index.php");
            } else {
                echo "<div id='mensaje' class='alert alert-danger'>Error al modificar el gato</div>";
            }
        } else {
            echo "<div id='mensaje' class='alert alert-danger'>Error al subir imagen</div>";
        }
    } else {
        // Si los tipos de archivo no son válidos, mostrar mensaje de error
        echo "<div id='mensaje' class='alert alert-danger'>Formato de imagen no válido. Por favor, asegúrate de subir imágenes en formato JPG, JPEG, PNG o WebP.</div>";
    }
}
?>