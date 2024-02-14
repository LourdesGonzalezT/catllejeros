<?php

// Verificar si se ha enviado el formulario
if(isset($_POST["btnRegisterCat"])) {
    
    // Verificar que los campos no estén vacíos (excepto la imagen)
    if(!empty($_POST["catName"]) && !empty($_POST["age"]) && !empty($_POST["sex"]) && !empty($_POST["aboutCat"])) {

        // Recoger los campos del formulario en variables
        $catName = $_POST["catName"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $aboutCat = $_POST["aboutCat"];

        // Variables que hacen referencia a las imágenes
        $image1 = $_FILES["image1"]["tmp_name"];
        $img1Name = $_FILES["image1"]["name"];
        $img1Type = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));
        $img1Directory = "images/catsImages/";

        $image2 = $_FILES["image2"]["tmp_name"];
        $img2Name = $_FILES["image2"]["name"];
        $img2Type = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));
        $img2Directory = "images/catsImages/";

        
        // Comprobamos si se han proporcionado imágenes
        if(!empty($image1) && !empty($image2)) {

        // Establecemos los formatos de imagen admitidos 
        if(($img1Type == "jpg" || $img1Type == "jpeg" || $img1Type == "png" || $img1Type == "webp") && 
           ($img2Type == "jpg" || $img2Type == "jpeg" || $img2Type == "png" || $img2Type == "webp")) {

            // Insertar datos del gato en la base de datos
            $register = $connection->query("INSERT INTO cats(catName, age, sex, aboutCat, image1_path, image2_path) 
                                            VALUES ('$catName', '$age', '$sex', '$aboutCat', '', '')");

            if($register) {
                // Obtener el ID del nuevo registro
                $idRegister = $connection->insert_id;

                // Añadir la ID al nombre de cada imagen
                $image1_path = $img1Directory . $idRegister . '-' . $img1Name;
                $image2_path = $img2Directory . $idRegister . '-' . $img2Name;

                // Actualizar las rutas de las imágenes en la base de datos
                $updateImage1 = $connection->query("UPDATE cats SET image1_path='$image1_path' WHERE catId='$idRegister'");
                $updateImage2 = $connection->query("UPDATE cats SET image2_path='$image2_path' WHERE catId='$idRegister'");

                if($updateImage1 && $updateImage2) {
                    // Mover los archivos de imagen a su ubicación definitiva
                    if(move_uploaded_file($image1, $image1_path) && move_uploaded_file($image2, $image2_path)) {
                        echo "<div class='alert alert-success'>Gato registrado con éxito</div>";
                    } else {
                        echo "<div class='alert alert-warning'>Error al mover el archivo</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Error al actualizar la ruta en la base de datos</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>Error al registrar el gato</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Por favor, introduce un formato de imagen válido</div>";
        }

    } else {
        // Insertar datos del gato en la base de datos sin las imágenes para que coja la que definí por defecto en la bbdd
        $register = $connection->query("INSERT INTO cats(catName, age, sex, aboutCat) 
                                        VALUES ('$catName', '$age', '$sex', '$aboutCat')");

if($register) {
    // Obtener el ID del nuevo registro
    $idRegister = $connection->insert_id;

    // Añadir la ID al nombre de la imagen1
    $image1_path = $img1Directory . $idRegister . '-' . $img1Name;

    // Actualizar la ruta de la imagen1 en la base de datos
    $updateImage1 = $connection->query("UPDATE cats SET image1_path='$image1_path' WHERE catId='$idRegister'");

    if($updateImage1) {
        // Mover el archivo de imagen1 a su ubicación definitiva
        if(move_uploaded_file($image1, $image1_path)) {
            echo "<div class='alert alert-success'>Gato registrado con éxito</div>";
        } else {
            echo "<div class='alert alert-warning'>Error al mover el archivo</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Error al actualizar la ruta de la imagen en la base de datos</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Error al registrar el gato</div>";
}
    }
        // Cerrar la conexión a la base de datos
        $connection->close();

    } else {
        echo "<div class='alert alert-danger'>Por favor, completa todos los campos</div>";
    }
}
?>
<script>
    history.replaceState(null, null, location.pathname);
</script>