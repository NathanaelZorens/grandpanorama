<?php
    // Create database connection using config file
    include_once("../config.php");
    include_once("../functions.php");
    
    session_start();
    autoKick();
    adminOnly();


    $id_page=$_GET['idPage'];

    $units = mysqli_query($mysqli, 
                        "SELECT * FROM unit_tb WHERE id_lo='$id_page'"
                        );
    $location = mysqli_query($mysqli, 
                            "SELECT * FROM lokasi_tb WHERE id_lo='$id_page'"
                                );
    
    $item2=mysqli_fetch_array($location);
    $pageTitle=$item2['nama_lo'];     
    // Fetch data
    $units = mysqli_query($mysqli, 
                        "SELECT * FROM unit_tb WHERE id_lo='$id_page'"
                        );
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/styles_pages.css">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">

    <title><?php echo "$pageTitle" ?></title>
    
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
                <a href="unit_page.php? idPage=GP3">Grand Panorama 3</a>
            </div>
        </div>

        <a href="../about.php">About</a>
        <a href="../mypage_user.php">My Page</a>

        <!--search bar-->
        <form class="searchBar" action="../actions/search_unit.php" method="POST">
            <input type="text" name="search" placeholder="Cari dari <?php echo $pageTitle ?>">
            <input type="hidden" name="idPage" value=<?php echo $id_page?>>
            <button type="submit" name=submit-search-<?php echo $id_page ?>>Search</button>
        </form>
    </div>
    <!--Header===============================================================================-->


    <!--Main==================================================================================-->
    <h1><?php echo "$pageTitle" ?></h1>

    <table height='50%' width='90%' border=1>
        
        <tr>
            <th>Unit</th> <th>L Tanah</th> <th>L Bangunan</th> <th>Harga</th> <th>Tanda Jadi</th> 
            <th>DP</th> <th>KPR</th> <th>Angsuran 5th</th> <th>Angsuran 10th</th> <th>Angsuran 15th</th>
            <th>Gambar</th> <th>Denah</th> <th>Keterangan</th> <th>Hook</th>
            
            <th>Edit</th> <th>Hapus</th>
            
        </tr>
        
        <?php

        $queryResults=mysqli_num_rows($units);

        if($queryResults > 0){
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
                
                echo "<td> <img class=\"imagesOnTableImg\" src= ../".$item['gambar_u']. "> </td>";
                
                echo "<td> <img class=\"imagesOnTableImg\" src= ../".$item['denah_u']. "> </td>";
                //echo "<td> <img style=\"width:90px;height:80px;\" src= ../".$item['denah_u']. "> </td>";
                
                echo "<td>".$item['ket_u']."</td>";
                echo "<td>".$item['hook_ket_u']."</td>";
                
                echo "<td ><a class=\"tableButton\" style=\"color:purple\" href='../actions/edit_unit.php? id=$item[id_u]'>Edit</a> </td>" ;
                echo "<td ><a class=\"tableButton\" style=\"color:red\" href='../actions/delete_unit.php? id=$item[id_u]'>Delete</a></td>";
                echo "</tr>";
            } }
            else {
                 echo "<tr>";
                 echo "<td colspan='16' style='text-align:center' >Masih Kosong</td>";
                 echo "</tr>";
            }
        ?>
        

    </table>
        </br>
        <br>

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