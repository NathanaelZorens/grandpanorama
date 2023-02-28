<?php
session_start();
include_once("config.php");
include_once("functions.php");
autoKick();
if($_SESSION['activeUserStatus']==='admin'){
    header("Location:mypage_admin.php");
    exit;
}

$idUser=$_SESSION['activeUser'];
$units = mysqli_query($mysqli, 
                        "SELECT A.id_u, B.luas_tanah_u, B.luas_bangunan_u, B.harga_u, B.gambar_u, B.denah_u 
                        from pilihan_tb A INNER JOIN unit_tb B ON A.id_u=B.id_u 
                                     WHERE id_usr='$idUser'" 
                        );

/*
SELECT A.pcard_name, B.designer_name, C.factory_name, A.pcard_harga 
    from pcard A INNER JOIN designer B ON A.designer_id=B.designer_id 
                INNER JOIN factory C ON A.factory_id=C.factory_id

                Join user id, unit id from pilihan_tb... inner join unit id, luas tan, luas bang, harga
*/ 

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_main.css">
    <link rel="icon" type="image/x-icon" href="assets/main/logo-transparent.ico">
    <title>User Profile</title>
</head>
<body>

<!--Header==================================================================================-->
<div class="topnav">
        <a href="index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="pages/unit_page.php? idPage=GP">Grand Panorama</a>
                <a href="pages/unit_page.php? idPage=GP">Grand Valley</a>
                <a href="pages/unit_page.php? idPage=GP">Grand Panorama 3</a>
            </div>
        </div>
        <a href="about.php">About</a>
        <a href="mypage_user.php">My Page</a>


        <!--search bar
        <form class="searchBar" action="../actions/search_unit_user.php" method="POST">
            <input type="text" name="search" placeholder="Cari dari Grand Panorama">
            <button type="submit" name="submit-search-GP-user">Search</button>
        </form>-->
    </div>
 <!--Header==================================================================================-->


<div class="userPageProfile">
    <h3>
        <?php echo "Hai, @".$_SESSION['activeUser']."";?>
    </h3>

    <!--<?php //echo "Anda Sebagai ".$_SESSION['activeUserStatus']."";  ?>-->
    <br>




<div class="favUnit">

    <h3>Unit Favorit:</h3>
    
    <table>
<th>Nama Unit</th> <th>Harga</th> <th>LT x LB</th> <th>Gambar</th> <th>Denah</th> <th>Aksi</th>
<?php 

$queryResult=mysqli_num_rows($units);

if ($queryResult === 0) { 
    //results are empty, do something here 
    echo "<tr>";
    echo "<td colspan='6' style='text-align:center' >Masih Kosong</td>";
    echo "</tr>";
 } 
 else { 
    while($item = mysqli_fetch_array($units)) {

                
        echo "<tr>";
        
        echo "<td class=\"rowName\">".$item['id_u']."</td>";
        echo "<td>".$item['harga_u']."</td>";

        //echo "<td>".$item['id_pil']."</td>";
        //echo "<td>".$item['id_u']."</td>";

        //echo "<td>".$item['luas_bangunan_u']."</td>";
        //echo "<td>".$item['harga_u']."</td>";
        
        echo "<td>".$item['luas_tanah_u']." X ".$item['luas_bangunan_u']."</td>";
        //echo "<td></td>";
        echo "<td> <img style=\"width:100px;height:80px;\" src= ".$item['gambar_u']. "> </td>";
        echo "<td> <img style=\"width:100px;height:80px;\" src= ".$item['denah_u']. "> </td>";
        
        
        
        echo "<td ><a class=\"tableButton\" href='actions/delete_pilihan.php? id=$item[id_u]'>Delete</a></td>";
        echo "</tr>";
        }
}



                
            
        
            ?>
</table>

</div>




    <br>
    

    <p class="logOutButton"><a href="logout.php">Log Out</a></p>

    </div>
    

    <!--Footer========================================================================-->
    <div class="footer">
        <img style="height:90px; width:250px; float:right; margin:20;" src="assets/main/logo-transparent.png"  alt="">
    
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