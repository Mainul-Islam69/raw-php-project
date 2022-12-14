<?php 
session_start();
require '../db.php';

$id= $_GET['id'];

$select_fact = "SELECT * FROM facts WHERE id=$id";
$select_fact_res = mysqli_query($db_connection, $select_fact);
$after_assoc = mysqli_fetch_assoc($select_fact_res);


if($after_assoc['status'] == 1){
    $select_status = "SELECT COUNT(*)as total_deactive FROM facts WHERE status=1";
    $select_status_res = mysqli_query($db_connection, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_deactive'] == 3){
        $_SESSION['limit'] = 'Minimum 3 Icon Have to active';
        header('location:fact.php');
    }
    else{
        $update_status2 = "UPDATE facts SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $update_status2);

        header('location:fact.php');
    }


}
else{
    $select_status = "SELECT COUNT(*)as total_active FROM facts WHERE status=1";
    $select_status_res = mysqli_query($db_connection, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_active'] >= 4){
        $_SESSION['limit'] = 'Maxmimum 4 Icon can be active';
        header('location:fact.php');
    }
    else{
        $update_status2 = "UPDATE facts SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update_status2);

        header('location:fact.php');
    }
}




?>