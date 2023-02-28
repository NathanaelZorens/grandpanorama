<?php
    // Create database connection using config file
    include_once("../config.php");
    // Fetch data
    
    $id_page=$_GET['idPage'];

    $units = mysqli_query($mysqli, 
                        "SELECT * FROM unit_tb WHERE id_lo='$id_page'"
                        );
    $location = mysqli_query($mysqli, 
                            "SELECT * FROM lokasi_tb WHERE id_lo='$id_page'"
                                );
    
    $item2=mysqli_fetch_array($location);
    $pageTitle=$item2['nama_lo'];     

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

    <!--Header==================================================================================-->
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
        <form class="searchBar" action="../actions/search_unit_user.php" method="POST">
            <input type="text" name="search" placeholder="Cari dari <?php echo $pageTitle ?>">
            <input type="hidden" name="idPage" value=<?php echo $id_page?>>
            <button type="submit" name="submit-search-<?php echo $id_page ?>-user">Search</button>
        </form>
    </div>
     <!--Header==================================================================================-->

    
     <!--Main==================================================================================-->
    <h1><?php echo "$pageTitle"?></h1>

    <table height='25%' width='15%' border=1>
      
        <?php
            $queryResults=mysqli_num_rows($units);

            if($queryResults>0){
            while($item=mysqli_fetch_array($units)) {

                
                echo "<tr>";
                    echo "<td>"; 
                    echo "<div class=\"unitOnList\">
                            <div class=\"imagesOnList\">
                                <img class=\"imagesOnListImg\" src= ../".$item['gambar_u']. "> 
                                <img class=\"imagesOnListImg\" src= ../".$item['denah_u']. ">
                            </div>
                            <br/>
                            <a class=\"unitNameLink\" href=\"../pages/detail_unit.php? unitName=$item[id_u]&idPage=$id_page\">".$item['id_u']."</a>
                            <br/>

                            <div class=\"shortDetail\">
                                T".$item['luas_tanah_u']. " X B" .$item['luas_bangunan_u']."
                                <br/>
                                Rp".$item['harga_u']."
                            </div>
                            </br>
                        </div>";
                        


                    echo "</td>";
                echo "</tr>";

                
                
            } }
            else {
                
                echo "<tr >";
                echo "<td  style='text-align:center' >Mohon Maaf, <br/>Masih belum ada...</td>";
                
                echo "</tr>";
            }
        ?>
        

    </table>

    <a class="backLink" href='../index.php'>Back</a>
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