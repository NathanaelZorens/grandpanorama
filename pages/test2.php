<?php

$idP=$_GET['x1'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hai
    <a href="unit_page.php? idPage=GP">GP</a><br>
    <a href="unit_page.php? idPage=GV">GV</a><br>
    <a href="unit_page.php? idPage=GP3">GP3</a><br>

    <a href="unit_page_admin.php? idPage=GP">GP</a><br>
    <a href="unit_page_admin.php? idPage=GV">GV</a><br>
    <a href="unit_page_admin.php? idPage=GP3">GP3</a><br>


    <a href="unit_page.php? idPage=<?php echo $idP?>">Back</a>
</body>
</html>