<?php

    include('db.php');
    $id = (int)$_GET['id'];
    $sql="DELETE FROM `regform`.`customers` WHERE `customers`.`id` = $id";
    mysqli_query($con,$sql);
    header("Location: index.php");
    exit();


?>