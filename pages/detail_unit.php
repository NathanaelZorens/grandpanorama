
<?php
include_once("../config.php");

$id_page=$_GET['idPage'];

$unitName = $_GET['unitName'];

$units = mysqli_query($mysqli, 
"SELECT * FROM unit_tb WHERE id_u='$unitName'");

while($row = mysqli_fetch_array($units))
    {
    $nama = $row['id_u'];
    $luasTan = $row['luas_tanah_u'];
    $luasBang = $row['luas_bangunan_u'];
    $harga = $row['harga_u'];
    $TanJad = $row['tanda_jadi_u'];
    $DP = $row['dp_u'];
    $KPR= $row['kpr_u'];
    $Ang5 = $row['angsuran_5_u'];
    $Ang10 = $row['angsuran_10_u'];
    $Ang15 = $row['angsuran_15_u'];
    $gambar=$row['gambar_u'];
    $denah=$row['denah_u'];
    $ket = $row['ket_u'];
    $lok = $row['id_lo'];
    $hook = $row['hook_ket_u'];
    }

$spaces = mysqli_query($mysqli, "SELECT * FROM lahan_tb WHERE luas_tanah_u=$luasTan AND luas_bangunan_u=$luasBang AND id_lo='$lok'");

/*while($row2=mysqli_fetch_array($spaces)){
    $lahan=$row2['id_lhn'];
}*/

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">
    <link rel="stylesheet" href="../pages/styles_pages.css">

    <title>Detail: <?php echo "$unitName"?></title>
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

<!--Main============================================================================================-->
    
    <div class="detailsBlockdiv">
       
        <div class="unitDetailsImg">
        <h3 class="unitDetailsTitle"><?php echo "$nama"?></h3>
            <img style="width:450px; " src= <?php echo "../$gambar"?>> 
            </br>
            </br>
            <img style="width:450px; " src= <?php echo "../$denah"?>>
        </div>    

        <div class="unitDetails"> 
        
            <table class="unitDetailsTable">
                <th colspan=2>Detail</th>
                <tr>
                    <td>Luas Tanah:</td> <td><?php echo "$luasTan"?></td>
                </tr>

                <tr>
                    <td>Luas Bangunan:</td> <td><?php echo "$luasBang"?></td>
                </tr>
            </table>
                
            <table class="unitDetailsTable">
                <tr>
                    <td>Harga:</td> <td><?php echo "$harga"?></td>
                </tr>

                <tr>
                    <td>Tanda Jadi:</td> <td><?php echo "$TanJad"?></td>
                </tr>

                <tr>
                    <td>Uang Muka:</td> <td><?php echo "$DP"?></td>
                </tr>

                <tr>
                    <td>KPR:</td> <td><?php echo "$KPR"?></td>
                </tr>

                <tr>
                    <td>Angsuran 5th:</td> <td><?php echo "$Ang5"?></td>
                </tr>
                <tr>
                    <td>Angsuran 10th:</td> <td><?php echo "$Ang10"?></td>
                </tr>
                <tr>
                    <td>Angsuran 15th:</td> <td><?php echo "$Ang15"?></td>
                </tr>
            </table>
            
            <table class="unitDetailsTable">
            <tr>
                <td>Ket:</td>
                <td>
                <?php
                    if($ket){
                        echo "$ket";
                    }
                    else{
                        echo "-";
                    }
                ?>
                </td>

            </tr>

            <tr>
                <td>Hook?</td>
                <td>
                <?php
                    if($hook==="Yes"){
                        echo "Ya";
                    }
                    if($hook==="No"){
                        echo "Bukan";
                    }
                ?>
                </td>
            </tr>

            
            </table>
            
            
            <table class="unitDetailsTable">
            <th>Lahan Tersedia:</th>
            <?php
            while($item2 = mysqli_fetch_array($spaces)) {
                echo "<tr>";
                
                    echo "<td>".$item2['id_lhn']."</td>";
                    
                echo "</tr>";
            } 
        ?>
            </table>
            
            
            
            <table class="unitDetailsTable" style="width:fit-content;">
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <a href="../actions/choose_unit.php?unit_id=<?php echo "$nama"?>" class="buttonChooseUnit">Bookmark</a>
                    </td>
                </tr>
            </table>    
            
            
            
            

        </div>
    </div>

    

    <a class="backLink" href='unit_page.php? idPage=<?php echo $id_page?>'>Back</a>
<!--Main============================================================================================-->


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