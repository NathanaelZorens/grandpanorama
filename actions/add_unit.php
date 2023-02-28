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

        <h2>Add Unit</h2>
        <form action="add_unit.php" method="post" name="form1" enctype="multipart/form-data">
            <table width="25%" border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text"  name="unit_id"></td>
                </tr>

                <tr>
                    <td>Luas Tanah:</td>
                    <td><input type="number" name="unit_luasTan"></td>
                </tr>

                <tr>
                    <td>Luas Bangunan:</td>
                    <td><input type="number" name="unit_luasBang"></td>
                </tr>
                
                <tr>
                    <td>Harga:</td>
                    <td><input type="number" name="unit_harga"></td>
                </tr>
                
                <tr>
                    <td>Tanda Jadi:</td>
                    <td><input type="number" name="unit_TanJad"></td>
                </tr>
                
                <tr>
                    <td>Uang Muka:</td>
                    <td><input type="number" name="unit_DP"></td>
                </tr>

                <tr>
                    <td>KPR:</td>
                    <td><input type="number" name="unit_KPR"></td>
                </tr>

                <tr>
                    <td>Angsuran ke-5:</td>
                    <td><input type="number" name="unit_ang5"></td>
                </tr>
                
                <tr>
                    <td>Angsuran ke-10:</td>
                    <td><input type="number" name="unit_ang10"></td>
                </tr>

                <tr>
                    <td>Angsuran ke-15:</td>
                    <td><input type="number" name="unit_ang15"></td>
                </tr>
                
                <tr>
                    <td>Gambar Unit:</td>
                    <td><input type="file" name="unit_gambar"></td>
                </tr>
                
                <tr>
                    <td>Denah Unit:</td>
                    <td><input type="file" name="unit_denah"></td>
                </tr>

                <tr>
                    <td>Keterangan:</td>
                    <td><input type="text" name="unit_ket"></td>
                </tr>

                <tr>
                    
                    
                    <td>Lokasi:</td>
                    <td>    
                        <select name="unit_lok">
                            <option value="">--- Pilih 1 ---</option>
                            <option value="GP">Grand Panorama</option>
                            <option value="GV">Grand Valley</option>
                            <option value="GP3">Grand Panorama 3</option>
                        </select>    
                    </td>

                </tr>


                

                <tr>
                    <td>Ket Hook:</td>
                    

                    <td> <select name="unit_hook">
                            <option value="">-Y/N-</option>
                            <option value="Yes">Yes--(O)</option>
                            <option value="No">No--(X)</option>
                            
                        </select> </td>
                </tr>
                
                
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit_Unit" value="Add"></td>
                </tr>
            </table>
        </form>
        <?php
            add_unit();

           
            

        ?>


</body>
</html>