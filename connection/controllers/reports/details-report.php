<?php
if(!empty($_POST["btndetailsReport"])){
    
    $id_oneReport=$_POST["id_oneReport"];
    $title=$_POST["title"];
    $reportDate=$_POST["reportDate"];
    $information=$_POST["information"];
    $reportImage_pat=$_POST["reportImage_pat"];

    $sql=$connection->query("SELECT * FROM reports WHERE reportId='$id_oneReport'");

}else{
    //    echo "error al buscar";
    }
?>