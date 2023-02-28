<?php
// Create database connection using config file
include_once("../config.php");
include_once('../functions.php');


// Display selected unit based on id
    // Getting id from url
    
    if (isset($_GET['id']))
    {$id = $_GET['id'];
    }
    else {
        header("Location: ../index.php");
    }
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM lahan_tb WHERE id_lhn='$id'");

    while($row = mysqli_fetch_array($result))
    {
    $nama = $row['id_lhn'];
    $luasTan = $row['luas_tanah_u'];
    $luasBang = $row['luas_bangunan_u'];

    $lok = $row['id_lo'];
    
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/styles_pages.css">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">

    <title>Edit</title>
</head>
<body>
        <br/>
        <a class="backLink" href='../mypage_admin.php'>Back</a>
        <h2>Edit Unit</h2>
        <form action="edit_lahan.php" method="post" name="edit_lahan" enctype="multipart/form-data">
            <table width="25%" border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="lhn_id" value='<?php echo $nama;?>'></td>
                </tr>

                <tr>
                    <td>Luas Tanah:</td>
                    <td><input type="number" onkeypress="return event.charCode != 32" name="lhn_luasTan" value=<?php echo $luasTan;?>></td>
                </tr>

                <tr>
                    <td>Luas Bangunan:</td>
                    <td><input type="number" onkeypress="return event.charCode != 32" name="lhn_luasBang" value=<?php echo $luasBang;?>></td>
                </tr>
                
                
               

                <tr>
                    <td>Lokasi:</td>
                    <td>    
                        <select name="lhn_lok">
                            <option value=<?php echo $lok;?>><?php echo $lok;?></option>
                            <option value="GP">Grand Panorama</option>
                            <option value="GV">Grand Valley</option>
                            <option value="GP3">Grand Panorama 3</option>
                        </select>    
                    </td>
                </tr>

                
                                
                <tr>
                    <td><input type="hidden" name="id_temp" value=<?php echo $_GET['id'];?>></td>
                    
                        
                    <td><input type="submit" name="Edit_Lahan" value="Update"></td>
                </tr>
            </table>
        </form>


        <?php
           // add_unit();

           //edit_Unit();
           
           if(isset($_POST['Edit_Lahan']))
           {
              
               $nama = $_POST['lhn_id'];
               $id=$_POST['id_temp']; 
               $luasTan = $_POST['lhn_luasTan'];
               $luasBang = $_POST['lhn_luasBang'];
               
            
               $lok = $_POST['lhn_lok'];
               
           
              global $mysqli;
               // update data
               $result = mysqli_query($mysqli, "UPDATE lahan_tb SET 

                          
                           id_lhn='$nama', 
                           luas_tanah_u='$luasTan', 
                           luas_bangunan_u='$luasBang',
                           
                           id_lo='$lok'
                               
           
                           
                           WHERE id_lhn='$id'");
               // Redirect to homepage to display updated data in list
            
            
               header("Location:../pages/lhn_page.php");
           }
          

        ?>


</body>
</html>