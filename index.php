<?php
    //ngecek udah login apa belum, kalau belum disuruh login dulu
    session_start();
    include_once("functions.php");
    
    
    
    

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_main.css">
    <link rel="icon" type="image/x-icon" href="assets/main/logo-transparent.ico">
    <title>Homepage</title>
</head>

<body>

    <!--Header==========================================================================-->
    <div class="topnav">
        <a href="index.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Unit <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="pages/unit_page.php? idPage=GP">Grand Panorama</a>
                <a href="pages/unit_page.php? idPage=GV">Grand Valley</a>
                <a href="pages/unit_page.php? idPage=GP3">Grand Panorama 3</a>
            </div>
        </div>

        
        <a href="about.php">About</a>
        <a href="mypage_user.php">My Page</a>


        <!--search bar
        <form class="searchBar" action="../actions/search_unit_user.php" method="POST">
            <input type="text" name="search" placeholder="Cari Unit">
            <button type="submit" name=submit-search-All-user>Search</button>
        </form>-->
    </div>
    <!--Header==========================================================================-->


    <!--Main==========================================================================-->
    
    <h1 class="frontPageTitle">Grand Panorama</h1>
    <div class="frontPage">

        <div class="frontGPdiv">
            <h2><a class="indexTitleGP" href= "pages/unit_page.php? idPage=GP">Grand Panorama</a></h2>
            <img style="height:90px; width:250px; " src="assets/main/Logo-Unit-GP.png" alt="">
            <h3><a class="indexTitleDetailButton" href="pages/unit_page.php? idPage=GP">Lebih Lanjut...</a></h3>
        </div>
        <br>

        <div class="frontGVdiv">
            <h2><a class="indexTitleGV" href= "pages/unit_page.php? idPage=GV">Grand Valley</a></h2>
            <img style="height:90px; width:250px; " src="assets/main/Logo-Unit-GV.png" alt="">
            <h3><a class="indexTitleDetailButton" href="pages/unit_page.php? idPage=GV">Lebih Lanjut...</a></h3>
        </div>
        <br>


        <div class="frontGP3div">
            <h2><a class="indexTitleGP3" href= "pages/unit_page.php? idPage=GP3">Grand Panorama 3</a></h2>
            <img style="height: 90px; width:250px; " src="assets/main/Logo-Unit-GP3.png" alt="">
            <h3><a class="indexTitleDetailButton" href="pages/unit_page.php? idPage=GP3">Lebih Lanjut...</a></h3>
        </div>
        <br>

    </div>

    <div class="frontSubTitle">
        <h2>Every day like Holiday</h2>
    <p>
        Hunian Istemewa Semarang Atas 
    </p>
    </div>


    
    
    

    <!--Main==========================================================================-->
   


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