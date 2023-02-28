<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hasil Pencarian</title>
<link rel="stylesheet" href="../pages/styles_pages.css">
<link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">

</head>


<body>

<div class="topnav">
<a href="../index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="../pages/unit_page.php? idPage=GP">Grand Panorama</a>
                <a href="../pages/unit_page.php? idPage=GV">Grand Valley</a>
                <a href="../pages/unit_page.php? idPage=GP3">Grad Panorama 3</a>
            </div>
        </div>

        <a href="../about.php">About</a>
        <a href="../mypage_user.php">My Page</a>

        <!--search bar
        <form class="searchBar" action="../actions/search_lahan.php" method="POST">
            <input type="text" name="search" placeholder="Cari">
            <button type="submit" name=submit-search-lahan>Search</button>
        </form>-->
    </div>

    <br>
<a class="backLink" href="../pages/lhn_page.php">Back</a>

<h3>Search Result:</h3>

<div class="des-container">

<table width='80%' border=1>
<tr>
<th>Lahan</th> <th>L Tanah</th> <th>L Bangunan</th> <th>Lokasi</th>
            
            <th>Edit</th> <th>Hapus</th>
</tr>


<?php
    include_once("../config.php");
    include_once("../functions.php");
    if(isset($_POST['submit-search-lahan'])) {

        search_Lahan();
        
    }

    
    ?>
</table>
</div>


</body>
</html>