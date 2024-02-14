<?php
if(!empty($_POST["btndetailsEvent"])){
    
    $id_oneEvent=$_POST["id_oneEvent"];
    $eventName=$_POST["eventName"];
    $eventDate=$_POST["eventDate"];
    $eventAddress=$_POST["eventAddress"];
    $eventDescription=$_POST["eventDescription"];
    $eventImage_path=$_POST["eventImage_path"];

    $sql=$connection->query("SELECT * FROM events WHERE eventId='$id_oneEvent'");

}else{
    //    echo "error al buscar";
    }
?>