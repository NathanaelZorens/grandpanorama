<?php
session_start();
include_once("functions.php");
autoKick();
adminOnly();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_main.css">
    <link rel="icon" type="image/x-icon" href="assets/main/logo-transparent.ico">
    <title>Admin Menu</title>
</head>
<body>

 <!--Header==========================================================================-->
 <div class="topnav">
        <a href="index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="pages/unit_page.php? idPage=GP">Grand Panorama</a>
                <a href="pages/unit_page.php? idPage=GV">Grand Valley</a>
                <a href="pages/unit_page.php? idPage=GP3">Grand Panorama 3</a>
            </div>
        </div>

        
        <a href="about.php">About</a>
        <a href="mypage_user.php">My Page</a>


        
    </div>
    <!--Header==========================================================================-->


<div class="adminMenu">
        <h2>Admin Menu</h2>
        <h3 class="adminButton"><a href="pages/unit_page_admin.php? idPage=GP">Grand Panorama(Admin View)</a></h3>
        <h3 class="adminButton"><a href="pages/unit_page_admin.php? idPage=GV">Grand Valley(Admin View)</a></h3>
        <h3 class="adminButton"><a href="pages/unit_page_admin.php? idPage=GP3">Grand Panorama 3(Admin View)</a></h3>

        <h3 class="adminButton"><a href="pages/lhn_page.php">List Lahan Kosong</a></h3>
          

    </br>
    <h3 class="adminButton"><a href= "actions/add_unit.php">Tambah Unit</a></h3>
    <h3 class="adminButton"><a href= "actions/add_lhn.php">Tambah Lahan</a></h3>
    
    <h3 class="adminButton"><a href="pages/chosen_unit.php">Unit yang dipilih</a></h3>
    <br>
    <h3 class="logOutButton"><a href="logout.php">Logout</a></h3>
    </div>
</body>
</html>