<?php
    // Create database connection using config file
    include_once("../config.php");
    include_once("../functions.php");
    
    session_start();
    autoKick();
    adminOnly();

    // Fetch data
    $units = mysqli_query($mysqli, 
                        "SELECT * FROM unit_tb WHERE id_lo='GP'"
                        );
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/styles_pages.css">
    <title>Grand Panorama</title>
    
</head>



<body>

    <!--Header===============================================================================-->
    <div class="topnav">
        <a href="../index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="../pages/gp_page.php">Grand Panorama</a>
                <a href="../pages/gv_page.php">Grand Valley</a>
                <a href="../pages/gp3_page.php">Grad Panorama 3</a>
            </div>
        </div>

        <a href="../about.php">About</a>
        <a href="../mypage_user.php">My Page</a>

        <!--search bar-->
        <form class="searchBar" action="../actions/search_unit.php" method="POST">
            <input type="text" name="search" placeholder="Cari dari Grand Panorama">
            <button type="submit" name=submit-search-GP>Search</button>
        </form>
    </div>
    <!--Header===============================================================================-->


    <!--Main==================================================================================-->
    <h1>Grand Panorama</h1>

    <table height='50%' width='90%' border=1>
        
        <tr>
            <th>Unit</th> <th>L Tanah</th> <th>L Bangunan</th> <th>Harga</th> <th>Tanda Jadi</th> 
            <th>DP</th> <th>KPR</th> <th>Angsuran 5th</th> <th>Angsuran 10th</th> <th>Angsuran 15th</th>
            <th>Gambar</th> <th>Denah</th> <th>Keterangan</th> <th>Hook</th>
            
            <th>Edit</th> <th>Hapus</th>
            
        </tr>
        
        <?php
            while($item = mysqli_fetch_array($units)) {
                echo "<tr>";
                
                echo "<td class=\"rowName\">".$item['id_u']."</td>";
                
                echo "<td>".$item['luas_tanah_u']."</td>";
                echo "<td>".$item['luas_bangunan_u']."</td>";
                echo "<td>".$item['harga_u']."</td>";
                echo "<td>".$item['tanda_jadi_u']."</td>";
                echo "<td>".$item['dp_u']."</td>";
                echo "<td>".$item['kpr_u']."</td>";
                echo "<td>".$item['angsuran_5_u']."</td>";
                echo "<td>".$item['angsuran_10_u']."</td>";
                echo "<td>".$item['angsuran_15_u']."</td>";
                
                echo "<td> <img style=\"width:90px;height:80px;\" src= ../".$item['gambar_u']. "> </td>";
                
                echo "<td> <img style=\"width:90px;height:80px;\" src= ../".$item['denah_u']. "> </td>";
                echo "<td>".$item['ket_u']."</td>";
                echo "<td>".$item['hook_ket_u']."</td>";
                
                echo "<td ><a class=\"tableButton\" href='../actions/edit_unit.php? id=$item[id_u]'>Edit</a> </td>" ;
                echo "<td ><a class=\"tableButton\" href='../actions/delete_unit.php? id=$item[id_u]'>Delete</a></td>";
                echo "</tr>";
            } 
        ?>
        

    </table>

    <a class="backLink" href='../mypage_admin.php'>Back</a>
    </br>
    </br>


    <!--Main==================================================================================-->



    <!--Footer==================================================================================-->
    <div class="footer">
        <h3>GRAND PANORAMA</h3>
            
        <p>
            Jln.xxxx No.xx</br>
            Telp    :xxxx </br>
            e-mail  : xxx@gmail.com</br>
        </p>
    </div>
    <!--Footer==================================================================================-->
</body>




</html>