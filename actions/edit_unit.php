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
    $result = mysqli_query($mysqli, "SELECT * FROM unit_tb WHERE id_u='$id'");

    while($row = mysqli_fetch_array($result))
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
        <form action="edit_unit.php" method="post" name="edit_unit" enctype="multipart/form-data">
            <table width="25%" border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_id" value='<?php echo $nama;?>'></td>
                    
                </tr>

                <tr>
                    <td>Luas Tanah:</td>
                    <td><input type="number" onkeypress="return event.charCode != 32" name="unit_luasTan" value=<?php echo $luasTan;?>></td>
                    
                </tr>

                <tr>
                    <td>Luas Bangunan:</td>
                    <td><input type="number" onkeypress="return event.charCode != 32" name="unit_luasBang" value=<?php echo $luasBang;?>></td>
                    
                </tr>
                
                <tr>
                    <td>Harga:</td>
                    <td><input type="number" onkeypress="return event.charCode != 32" name="unit_harga" value=<?php echo $harga;?>></td>
                    
                </tr>
                
                <tr>
                    <td>Tanda Jadi:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_TanJad" value=<?php echo $TanJad;?>></td>
                    
                </tr>
                
                <tr>
                    <td>Uang Muka:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_DP" value=<?php echo $DP;?>></td>
                    
                </tr>

                <tr>
                    <td>KPR:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_KPR" value=<?php echo $KPR;?>></td>
                    
                </tr>

                <tr>
                    <td>Angsuran ke-5:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_ang5" value=<?php echo $Ang5;?>></td>
                    
                </tr>
                
                <tr>
                    <td>Angsuran ke-10:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_ang10" value=<?php echo $Ang10;?>></td>
                    
                </tr>

                <tr>
                    <td>Angsuran ke-15:</td>
                    <td><input type="text" onkeypress="return event.charCode != 32" name="unit_ang15" value=<?php echo $Ang15;?>></td>
                    
                </tr>
                
                <tr>
                    <td>Gambar Unit:</td>
                    <td><img src="<?php echo "../$gambar"; ?>" width="100">
                    
                    <input type="file" name="unit_gambar" ></td>
                </tr>
                
                <tr>
                    <td>Denah Unit:</td>
                    <td><img src="<?php echo "../$denah";?>" width="100">
                    <input type="file" name="unit_denah"></td>
                </tr>

                <tr>
                    <td>Keterangan:</td>
                    <td><input type="text" name="unit_ket" value='<?php echo $ket;?>'></td>
                    
                </tr>

                <tr>
                    <td>Lokasi:</td>
                    <td>    
                        <select name="unit_lok">
                            <option value=<?php echo $lok;?>><?php echo $lok;?></option>
                            <option value="GP">Grand Panorama</option>
                            <option value="GV">Grand Valley</option>
                            <option value="GP3">Grand Panorama 3</option>
                        </select>    
                    </td>
                    
                </tr>

                <tr>
                    <td>Ket Hook:</td>
                    <td>
                    <select name="unit_hook">
                            <option value='<?php echo $hook;?>'?><?php echo $hook;?></option>
                            <option value="Yes">Yes--(O)</option>
                            <option value="No">No--(X)</option>
                            
                    </select>     
                    </td>
                    
                </tr>
                                
                <tr >
                    <td><input type="hidden" name="id_temp" value=<?php echo $_GET['id'];?>>
                    <input type="hidden" name="gambarLama" value=<?php echo $gambar;?>>
                        <input type="hidden" name="denahLama" value=<?php echo $denah;?>></td>
                        
                    <td ><input type="submit" name="Edit_Unit" value="Update" ></td>
                    
                </tr>
            </table>
        </form>


        <?php
           // add_unit();

           edit_Unit();
           

          

        ?>


</body>
</html>