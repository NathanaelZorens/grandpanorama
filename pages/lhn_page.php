<?php
    // Create database connection using config file
    include_once("../config.php");
    include_once("../functions.php");
    
    session_start();
    autoKick();
    adminOnly();


    //$id_page=$_GET['idPage'];

    $lahan = mysqli_query($mysqli, 
                        "SELECT * FROM lahan_tb"
                        );
    
    
     
    // Fetch data
    
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/styles_pages.css">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">

    <title>Lahan Tersedia</title>
    
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
        <form class="searchBar" action="../actions/search_lahan.php" method="POST">
            <input type="text" name="search" placeholder="Cari lahan...">
            <button type="submit" name=submit-search-lahan ?>Search</button>
        </form>
    </div>
    <!--Header===============================================================================-->


    <!--Main==================================================================================-->
    <h1>Lahan Tersedia</h1>

    <table height='50%' width='90%' border=1>
        
        <tr>
            <th>Lahan</th> <th>L Tanah</th> <th>L Bangunan</th> <th>Lokasi</th>
            
            <th>Edit</th> <th>Hapus</th>
            
        </tr>
        
        <?php
            while($item = mysqli_fetch_array($lahan)) {
                echo "<tr>";
                
                echo "<td class=\"rowName\">".$item['id_lhn']."</td>";
                
                echo "<td>".$item['luas_tanah_u']."</td>";
                echo "<td>".$item['luas_bangunan_u']."</td>";
                echo "<td>".$item['id_lo']."</td>";
                
                
                echo "<td ><a class=\"tableButton\" style=\"color:purple\" href='../actions/edit_lahan.php? id=$item[id_lhn]'>Edit</a> </td>" ;
                echo "<td ><a class=\"tableButton\" style=\"color:red\" href='../actions/delete_lahan.php? id=$item[id_lhn]'>Delete</a></td>";
                echo "</tr>";
            } 
        ?>
        

    </table>

    <a class="backLink" href='../mypage_admin.php'>Back</a>
    </br>
    </br>


    <!--Main==================================================================================-->



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