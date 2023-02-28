<?php

//Nanti dibuat biar bisa masukin beberapa lahan langsung, 5 dulu. 
//jadi untuk ukuran lahan yang sama bisa nginput beberapa lahan
//misal 45X78 cukup nulis sekali terus bawahnya tinngal ngisi nama lahan misal B1-2, B1-3, B1-4, dst. 

?>

<?php
// Create database connection using config file

include_once('../functions.php');



?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/styles_pages.css">
    <link rel="icon" type="image/x-icon" href="../assets/main/logo-transparent.ico">

    
    <title>Tambah Unit</title>
</head>
<body>
    <br>
<a class="backLink" href='../mypage_admin.php'>Back</a>

        <h2>Tambah Lahan</h2>
        <form  action="add_lhn.php" method="post" name="form1" enctype="multipart/form-data">
            <table width="25%" border="0">
                

                <tr>
                    <td>Luas Tanah:</td>
                    <td><input type="number" name="lhn_luasTan"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Luas Bangunan:</td>
                    <td><input type="number" name="lhn_luasBang"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td>Name:</td>
                    <td><input type="text"  name="lhn_id_1"></td>
                    <td><input type="text"  name="lhn_id_2"></td>
                    <td><input type="text"  name="lhn_id_3"></td>
                    <td><input type="text"  name="lhn_id_4"></td>
                    <td><input type="text"  name="lhn_id_5"></td>
                </tr>

                    <td>Lokasi:</td>
                    <td>    
                        <select name="lhn_lok">
                            <option value="">--- Pilih 1 ---</option>
                            <option value="GP">Grand Panorama</option>
                            <option value="GV">Grand Valley</option>
                            <option value="GP3">Grand Panorama 3</option>
                        </select>    
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>


                

                
                
                
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit_Lahan" value="Add"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
            //add_lhn();

           // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit_Lahan'])) {
        
        $luasTan = $_POST['lhn_luasTan'];
        $luasBang = $_POST['lhn_luasBang'];

        
        $nama1 = str_replace(' ','',$_POST['lhn_id_1']);
        $nama2 = str_replace(' ','',$_POST['lhn_id_2']);
        $nama3 = str_replace(' ','',$_POST['lhn_id_3']);
        $nama4 = str_replace(' ','',$_POST['lhn_id_4']);
        $nama5 = str_replace(' ','',$_POST['lhn_id_5']);


        $lok = $_POST['lhn_lok'];
        

     // include database connection file
        //include_once("config.php");
       global $mysqli;
        
       include_once("../config.php");

     // Insert user data into table

        if(isset($nama1)) {
            $result = mysqli_query($mysqli, 
            "INSERT INTO lahan_tb(id_lhn,luas_tanah_u,luas_bangunan_u,id_lo) 
            VALUES('$nama1',$luasTan,$luasBang,'$lok')");
        }

        if(isset($nama2)) {
            $result = mysqli_query($mysqli, 
            "INSERT INTO lahan_tb(id_lhn,luas_tanah_u,luas_bangunan_u,id_lo) 
            VALUES('$nama2',$luasTan,$luasBang,'$lok')");
        }

        if(isset($nama3)) {
            $result = mysqli_query($mysqli, 
            "INSERT INTO lahan_tb(id_lhn,luas_tanah_u,luas_bangunan_u,id_lo) 
            VALUES('$nama3',$luasTan,$luasBang,'$lok')");
        }

        if(isset($nama4)) {
            $result = mysqli_query($mysqli, 
            "INSERT INTO lahan_tb(id_lhn,luas_tanah_u,luas_bangunan_u,id_lo) 
            VALUES('$nama4',$luasTan,$luasBang,'$lok')");
        }

        if(isset($nama5)) {
            $result = mysqli_query($mysqli, 
            "INSERT INTO lahan_tb(id_lhn,luas_tanah_u,luas_bangunan_u,id_lo) 
            VALUES('$nama5',$luasTan,$luasBang,'$lok')");
        }
        
    
            

     // Show message when user added
        echo "ADDED   <a href='../index.php'>Click here to Continue</a>";
    }
            

        ?>


</body>
</html>