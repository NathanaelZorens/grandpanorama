<?php
include_once("../config.php");
include_once("../functions.php");
session_start();
autoKick();

$units=mysqli_query($mysqli, 
"SELECT pilihan_tb.id_pil, pilihan_tb.id_u,user_tb.id_usr,user_tb.nama_usr, user_tb.nik_usr, user_tb.telp_usr
FROM pilihan_tb
INNER JOIN user_tb ON pilihan_tb.id_usr = user_tb.id_usr;"
);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_pages.css">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">


    <title>List Bookmark User</title> 
</head>
<body>

<!--Header===============================================================================-->
<div class="topnav">
        <a href="../index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="unit_page.php? idPage=GP">Grand Panorama</a>
                <a href="unit_page.php? idPage=GV">Grand Valley</a>
                <a href="unit_page.php? idPage=GP3">Grad Panorama 3</a>
            </div>
        </div>

        <a href="../about.php">About</a>
        <a href="../mypage_user.php">My Page</a>

        <!--search bar-->
        <form class="searchBar" action="../actions/search_bkmrk.php" method="POST">
            <input type="text" name="search" placeholder="Cari bookmark...">
            <button type="submit" name=submit-search-bkmrk ?>Search</button>
        </form>
    </div>
    <!--Header===============================================================================-->


    <h2>List Bookmark User</h2>

    <!-- Nanti nampilin pilihan yang ada, no pilihan, nama unit, nama orang/user yang milih -->
    <table width=10% border=2>
        <th>Unit</th> <th>User</th> <th>Nama Lengkap</th> <th>No.telp</th>

        <?php
            while($item = mysqli_fetch_array($units)) {
                echo "<tr>";
                
                echo "<td class=\"rowName\">".$item['id_u']."</td>";
                echo "<td>".$item['id_usr']."</td>";
                echo "<td>".$item['nama_usr']."</td>";
                echo "<td>".$item['telp_usr']."</td>";
            } 
        ?>

    </table>

            <br>
            <br>
    <a class="backLink" href='../mypage_admin.php'>Back</a>

    <!--Footer========================================================================-->
    <div class="footer">
        <img style="height:90px; width:250px; float:right; margin:20;" src="../assets/main/logo-transparent.png"  alt="">
    
        <div>
        <h3 >GRAND PANORAMA</h3>
        
        <p >
            Jln. Panorama Raya A1-A, <br/>Pudak Payung-Banyumanik, Semarang</br>
        </p>
        </div>

    </div>
    <!--Footer========================================================================-->

</body>
</html>