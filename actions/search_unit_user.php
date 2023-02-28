

<?php
$id_page=$_POST['idPage'];
?>

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
        <form class="searchBar" action="../actions/search_unit_user.php" method="POST">
            <input type="text" name="search" placeholder="Cari">
            <button type="submit" name=submit-search-GP-user>Search</button>
        </form>-->
    </div>


<h3>Search Result:</h3>



<table height='25%' width='15%' border=1>



<?php
    include_once("../config.php");
    include_once("../functions.php");
    
    if(isset($_POST['submit-search-GP-user'])) {

        search_Unit_user('GP');
        
    }


    //Kalau GV
    if(isset($_POST['submit-search-GV-user'])) {

        search_Unit_user('GV');
        
    }

    //Kalau GP3
    if(isset($_POST['submit-search-GP3-user'])) {

        search_Unit_user('GP3');
        
    }

    
    ?>




</table>
<a class="backLink" href="../pages/unit_page.php? idPage=<?php echo $id_page?>">Back</a>




</body>
</html>