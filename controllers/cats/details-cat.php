<?php
if(!empty($_POST["btndetailsCat"])){
    
    $id_oneCat=$_POST["id_oneCat"];
    $catName=$_POST["catName"];
    $age=$_POST["age"];
    $sex=$_POST["sex"];
    $aboutCat=$_POST["aboutCat"];
    $image1_path=$_POST["image1_path"];
    $image2_path=$_POST["image2_path"];

    $sql=$connection->query("SELECT * FROM cats WHERE catId='$id_oneCat'");

}else{
    //    echo "error al buscar";
    }
?>