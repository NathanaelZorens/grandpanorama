<?php
include_once("../functions.php");
include_once("../config.php");


session_start();
//autoKick();
//beda folder, pakai autoKick() headernya nanti not found, pakai manual... maksudnya source code-nya ditulis di sini
if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

$unitId=$_GET['unit_id'];
$idUser=$_SESSION['activeUser'];
//add new row on pilihan__tb
//fill with id unit and id pilihan
//update id pilihan on usr_tb
$result=mysqli_query($mysqli,"INSERT INTO pilihan_tb(id_pil,id_usr,id_u) VALUES ('','$idUser','$unitId')") ;

$result2=mysqli_query($mysqli,"SELECT * FROM pilihan_tb WHERE id_u='$unitId'");

$row=mysqli_fetch_assoc($result2);
$idPilihan=$row['id_pil'];

$result3=mysqli_query($mysqli, "UPDATE user_tb 
                                SET id_pil = '$idPilihan'
                                WHERE id_usr = '$idUser';");

header("Location:../mypage_user.php")

?>