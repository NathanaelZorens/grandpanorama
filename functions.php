<?php
// Create database connection using config file
include_once("config.php");




function test($a,$b){
 $c=$a+$b;
 echo $c;
}

function autoKick(){
    //ini buat pokoknya harus login dulu
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
}

function adminOnly(){
    //ini buat kalau bukan admin nggak bisa masuk
    if($_SESSION["activeUserStatus"]==='user')
    {
        header("Location:index.php");
        exit;
    }
}   




function add_Unit(){
    //include_once ('add_unit.php');

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit_Unit'])) {
        $nama = str_replace(' ','',$_POST['unit_id']);
        $luasTan = $_POST['unit_luasTan'];
        $luasBang = $_POST['unit_luasBang'];
        $harga = $_POST['unit_harga'];
        $TanJad = $_POST['unit_TanJad'];
        $DP = $_POST['unit_DP'];
        $KPR= $_POST['unit_KPR'];
        $Ang5 = $_POST['unit_ang5'];
        $Ang10 = $_POST['unit_ang10'];
        $Ang15 = $_POST['unit_ang15'];
        $gambar=upload_Image(); //up gambar
        $denah=upload_Denah(); //up denah
        $ket = $_POST['unit_ket'];
        $lok = $_POST['unit_lok'];
        $hook = $_POST['unit_hook'];

     // include database connection file
        //include_once("config.php");
       global $mysqli;
        
       include_once("config.php");

     // Insert user data into table
        $result = mysqli_query($mysqli, 
            "INSERT INTO unit_tb(id_u,luas_tanah_u,luas_bangunan_u,harga_u,tanda_jadi_u,dp_u,kpr_u,angsuran_5_u,angsuran_10_u,angsuran_15_u,gambar_u,denah_u,ket_u,id_lo,hook_ket_u) 
            VALUES('$nama',$luasTan,$luasBang,$harga,$TanJad,$DP,$KPR,$Ang5,$Ang10,$Ang15,'$gambar', '$denah',  '$ket','$lok','$hook')"
        );

     // Show message when user added
        echo "ADDED   <a href='../index.php'>Click here to Continue</a>";
    }
}


function upload_Image(){
    $namaFile=$_FILES['unit_gambar']['name'];
    $ukuranFile=$_FILES['unit_gambar']['size'];
    $errorFile=$_FILES['unit_gambar']['error'];
    $tmpFile=$_FILES['unit_gambar']['tmp_name'];

    //Check Image availability
    if($errorFile===4){
            return null;
        }

    $validExten=['jpg','jpeg','png'];
    $ekstensiFile = explode('.',$namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile,$validExten)){
        echo "format gambar tidak valid";
        die;
        //header("Location:../index.php");
        }
    
    if ($ukuranFile>1000000){
        echo"file terlalu besar";
        die;
    }
    
    //new random file name
    $namaFileBaru=uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    //uploading image
    move_uploaded_file($tmpFile,'../assets/unit_image/' . $namaFileBaru);

    return 'assets/unit_image/' . $namaFileBaru;

}


function upload_Denah(){
    $namaFile=$_FILES['unit_denah']['name'];
    $ukuranFile=$_FILES['unit_denah']['size'];
    $errorFile=$_FILES['unit_denah']['error'];
    $tmpFile=$_FILES['unit_denah']['tmp_name'];

    //Check Image availability
    if($errorFile===4){
            return null;
        }

    $validExten=['jpg','jpeg','png'];
    $ekstensiFile = explode('.',$namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile,$validExten)){
        echo "format gambar tidak valid";
        die;
        //header("Location:../index.php");
        }
    
    if ($ukuranFile>1000000){
        echo"file terlalu besar";
        die;
    }
    
    //new random file name
    $namaFileBaru=uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    //uploading image
    move_uploaded_file($tmpFile,'../assets/unit_image/' . $namaFileBaru);

    return 'assets/unit_image/' . $namaFileBaru;

}





function edit_Unit(){

    

    if(isset($_POST['Edit_Unit']))
           {
              
               $nama = $_POST['unit_id'];
               $id=$_POST['id_temp']; 
               $luasTan = $_POST['unit_luasTan'];
               $luasBang = $_POST['unit_luasBang'];
               $harga = $_POST['unit_harga'];
               $TanJad = $_POST['unit_TanJad'];
               $DP = $_POST['unit_DP'];
               $KPR= $_POST['unit_KPR'];
               $Ang5 = $_POST['unit_ang5'];
               $Ang10 = $_POST['unit_ang10'];
               $Ang15 = $_POST['unit_ang15'];
               $gambarLama=$_POST['gambarLama'];
               $denahLama=$_POST['denahLama'];

               if($_FILES['unit_gambar']['error']===4){
                    $gambar=$gambarLama;    
               }
               else{
                   $gambar=upload_Image();
               }


               if($_FILES['unit_denah']['error']===4){
                $denah=$denahLama;    
                }
               else{
                $denah=upload_Denah();
               }
               
               $ket = $_POST['unit_ket'];
               $lok = $_POST['unit_lok'];
               $hook = $_POST['unit_hook'];
           
              global $mysqli;
               // update data
               $result = mysqli_query($mysqli, "UPDATE unit_tb SET 

                          
                           id_u='$nama', 
                           luas_tanah_u='$luasTan', 
                           luas_bangunan_u='$luasBang',
                           harga_u='$harga',
                           tanda_jadi_u='$TanJad',
                           dp_u='$DP',
                           kpr_u='$KPR',
                           angsuran_5_u='$Ang5',
                           angsuran_10_u='$Ang10',
                           angsuran_15_u='$Ang15',
                           gambar_u='$gambar',
                           denah_u='$denah',
                           ket_u='$ket',
                           id_lo='$lok',
                           hook_ket_u='$hook'    
           
                           
                           WHERE id_u='$id'");
               // Redirect to homepage to display updated data in list
            
            
               header("Location:../index.php");
           }
}


function search_Unit($location){

    global $mysqli;
    $search= mysqli_real_escape_string($mysqli, $_POST['search']);
        $result= mysqli_query($mysqli, 
        "SELECT * FROM unit_tb 
                    WHERE id_lo='$location' AND (id_u LIKE '%$search%' OR ket_u LIKE '%$search%' OR hook_ket_u LIKE '%$search%' OR harga_u LIKE '%$search%' OR luas_tanah_u LIKE '%$search%' OR luas_bangunan_u LIKE '%$search%')");
        $queryResults = mysqli_num_rows($result);    
        //coba dibuat biar file-nya sama code buat nunjukin hasil tetep satu, tapi yang name untuk submit-nya yang dibedain jadi nanti if isset-nya bisa ada 3.    
    //bedain di WHERE id_loc=gitu
    //kalau GV


        
        if ($queryResults > 0) {
            
            while ($item = mysqli_fetch_assoc($result)){
                echo "<tr>";
                
                echo "<td>".$item['id_u']."</td>";
                echo "<td>".$item['luas_tanah_u']."</td>";
                echo "<td>".$item['luas_bangunan_u']."</td>";
                echo "<td>".$item['harga_u']."</td>";
                echo "<td>".$item['tanda_jadi_u']."</td>";
                echo "<td>".$item['dp_u']."</td>";
                echo "<td>".$item['kpr_u']."</td>";
                echo "<td>".$item['angsuran_5_u']."</td>";
                echo "<td>".$item['angsuran_10_u']."</td>";
                echo "<td>".$item['angsuran_15_u']."</td>";
                echo "<td> <img style=\"width:90px;height:80px;\" src= ../".$item['gambar_u']. "> </td>";
                echo "<td> <img style=\"width:90px;height:80px;\" src= ../".$item['denah_u']. "> </td>";
                echo "<td>".$item['ket_u']."</td>";
                echo "<td>".$item['hook_ket_u']."</td>";
                
                echo "<td><a class=\"tableButton\" style=\"color:purple\" href='edit_unit.php? id=$item[id_u]'>Edit</a> </td>" ;
                echo "<td><a class=\"tableButton\" style=\"color:red\" href='delete_unit.php? id=$item[id_u]'>Delete</a></td></tr>";
            }
        }

        else{
            echo "No Result";
        }


}


function search_Unit_user($location){

    global $mysqli;
    $search= mysqli_real_escape_string($mysqli, $_POST['search']);
    global $result;
        $result= mysqli_query($mysqli, 
        "SELECT * FROM unit_tb 
                    WHERE id_lo='$location' AND (id_u LIKE '%$search%' OR ket_u LIKE '%$search%' OR hook_ket_u LIKE '%$search%' OR harga_u LIKE '%$search%' OR luas_tanah_u LIKE '%$search%' OR luas_bangunan_u LIKE '%$search%')");
        $queryResults = mysqli_num_rows($result);    
        //coba dibuat biar file-nya sama code buat nunjukin hasil tetep satu, tapi yang name untuk submit-nya yang dibedain jadi nanti if isset-nya bisa ada 3.    
    //bedain di WHERE id_loc=gitu
    //kalau GV

        
        if ($queryResults > 0) {
            
            while ($item = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td> 
                    <div class=\"imagesOnList\">
                        <img class=\"imagesOnListImg\" \" src= ../".$item['gambar_u']. "> 
                        <img class=\"imagesOnListImg\" \" src= ../".$item['denah_u']. ">
                     </div>
                        <br/>
                        <a class=\"unitNameLink\" href=\"../pages/detail_unit.php? unitName=$item[id_u]&idPage=$location\">".$item['id_u']."</a>
                        <br/>
        
                        <div class=\"shortDetail\">
                            T".$item['luas_tanah_u']. " X B" .$item['luas_bangunan_u']."
                            <br/>
                            Rp".$item['harga_u']."
                        </div>
                        <br/>
        
        
        
                    </td>";
                echo "</tr>";
                
            }
            
            
        }

        else{
            echo "No Result";
        }


}

function search_Lahan(){
    global $mysqli;
    $search= mysqli_real_escape_string($mysqli, $_POST['search']);
        $result= mysqli_query($mysqli, 
        "SELECT * FROM lahan_tb 
                    WHERE id_lhn LIKE '%$search%' OR luas_tanah_u LIKE '%$search%' OR luas_bangunan_u LIKE '%$search%'   OR id_lo LIKE '%$search%'");
        $queryResults = mysqli_num_rows($result);    


        
        if ($queryResults > 0) {
            
            while ($item = mysqli_fetch_assoc($result)){
                echo "<tr>";
                
                echo "<td>".$item['id_lhn']."</td>";
                echo "<td>".$item['luas_tanah_u']."</td>";
                echo "<td>".$item['luas_bangunan_u']."</td>";
                echo "<td>".$item['id_lo']."</td>";
                
                
                echo "<td><a class=\"tableButton\" style=\"color:purple\" href='edit_unit.php? id=$item[id_lhn]'>Edit</a> </td>" ;
                echo "<td><a class=\"tableButton\" style=\"color:red\" href='delete_unit.php? id=$item[id_lhn]'>Delete</a></td></tr>";
            }
        }

        else{
            echo "No Result";
        }
}

function search_pilihan(){
    global $mysqli;
    $search= mysqli_real_escape_string($mysqli, $_POST['search']);
        $result= mysqli_query($mysqli, 
        //"SELECT * FROM pilihan_tb 
        //            WHERE id_usr LIKE '%$search%' OR id_u LIKE '%$search%'");


  "SELECT pilihan_tb.id_pil, pilihan_tb.id_u,user_tb.id_usr,user_tb.nama_usr, user_tb.nik_usr, user_tb.telp_usr
FROM pilihan_tb
INNER JOIN user_tb ON pilihan_tb.id_usr = user_tb.id_usr 
WHERE user_tb.id_usr LIKE '%$search%' OR pilihan_tb.id_u LIKE '%$search%' OR user_tb.nama_usr LIKE '%$search%' OR user_tb.telp_usr LIKE '%$search%' ;" );

        $queryResults = mysqli_num_rows($result);    


        
        if ($queryResults > 0) {
            
            while ($item = mysqli_fetch_assoc($result)){
                echo "<tr>";
                
                echo "<td class=\"rowName\">".$item['id_u']."</td>";
                echo "<td>".$item['id_usr']."</td>";
                echo "<td>".$item['nama_usr']."</td>";
                echo "<td>".$item['telp_usr']."</td>";
                
            }
        }

        else{
            echo "No Result";
        }
}








?>


