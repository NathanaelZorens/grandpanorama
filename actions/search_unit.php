<?php
$id_page=$_POST['idPage'];
?>

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
        <form class="searchBar" action="../actions/search_unit.php" method="POST">
            <input type="text" name="search" placeholder="Cari">
            <button type="submit" name=submit-search-GP>Search</button>
        </form>-->
    </div>


</br>
<a class="backLink" href="../pages/unit_page_admin.php? idPage=<?php echo $id_page?>">Back</a>

<h3>Search Result:</h3>

<div >

<table width='80%' border=1>
<tr>
<th>Unit</th> <th>L Tanah</th> <th>L Bangunan</th> <th>Harga</th> <th>Tanda Jadi</th> 
            <th>DP</th> <th>KPR</th> <th>Angsuran 5th</th> <th>Angsuran 10th</th> <th>Angsuran 15th</th>
            <th>Gambar</th> <th>Denah</th> <th>Keterangan</th> <th>Hook</th>
            
            <th>Edit</th> <th>Hapus</th>
</tr>


<?php
    include_once("../config.php");
    include_once("../functions.php");
    if(isset($_POST['submit-search-GP'])) {

        search_Unit('GP');
        
    }


    //Kalau GV
    if(isset($_POST['submit-search-GV'])) {

        search_Unit('GV');
        
    }

    //Kalau GP3
    if(isset($_POST['submit-search-GP3'])) {

        search_Unit('GP3');
        
    }
    
    ?>
</table>
</div>


</body>
</html>