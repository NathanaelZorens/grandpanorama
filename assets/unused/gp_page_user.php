<?php
    // Create database connection using config file
    include_once("../config.php");
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

    <!--Header==================================================================================-->
    <div class="topnav">
        <a href="../index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="../pages/gp_page_user.php">Grand Panorama</a>
                <a href="../pages/gv_page_user.php">Grand Valley</a>
                <a href="../pages/gp3_page_user.php">Grand Panorama 3</a>
            </div>
        </div>
        
        <a href="../about.php">About</a>
        <a href="../mypage_user.php">My Page</a>

        <!--search bar-->
        <form class="searchBar" action="../actions/search_unit_user.php" method="POST">
            <input type="text" name="search" placeholder="Cari dari Grand Panorama">
            <button type="submit" name="submit-search-GP-user">Search</button>
        </form>
    </div>
     <!--Header==================================================================================-->

    
     <!--Main==================================================================================-->
    <h1>Grand Panorama</h1>

    <table height='25%' width='15%' border=1>
      
        <?php
            while($item = mysqli_fetch_array($units)) {

                
                echo "<tr>";
                    echo "<td>"; 
                    echo "<div class=\"unitOnList\">
                            <div class=\"imagesOnList\">
                                <img class=\"imagesOnListImg\" src= ../".$item['gambar_u']. "> 
                                <img class=\"imagesOnListImg\" src= ../".$item['denah_u']. ">
                            </div>
                            <br/>
                            <a class=\"unitNameLink\" href=\"../pages/detail_unit.php? unitName=$item[id_u]\">".$item['id_u']."</a>
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

                
                
            } 
        ?>
        

    </table>

    <a class="backLink" href='../index.php'>Back</a>
    </br>
    </br>

    
    <!--Main==================================================================================-->

    
    <!--Footer==================================================================================-->

    <div class="footer">
        <h3>Sasa Sedaya</h3>
            
        <p>
            Jln.xxxx No.xx</br>
            Telp    :xxxx </br>
            e-mail  : xxx@gmail.com</br>
        </p>
    </div>
    <!--Footer==================================================================================-->
    
</body>



</html>