<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_main.css">
    <link rel="icon" type="image/x-icon" href="assets/main/logo-transparent.ico">
    <title>Register</title>
</head>


<body>
    <br>
<a class="backLink" href='login.php'>Back</a>
<h2>Register</h2>

      
        <form action="register_user.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>ID:</td>
                    <td><input type="text"  name="user_id"></td>
                </tr>

                <tr>
                    <td>Nama:</td>
                    <td><input type="text" name="user_nama"></td>
                </tr>

                <tr>
                    <td>NIK:</td>
                    <td><input type="text" name="user_nik"></td>
                </tr>
                
                <tr>
                    <td>No.HP:</td>
                    <td><input type="text" name="user_hp"></td>
                </tr>
                
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="user_pass"></td>
                </tr>
                
                <tr>
                    <td>Konfirmasi Password:</td>
                    <td><input type="password" name="user_pass2"></td>
                </tr>

                
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit_User" value="Register"></td>
                </tr>
            </table>
        </form>
        <?php
            //add_User();
             //include_once ('add_unit.php');
             include_once("config.php");
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit_User'])) {
                    $id = strtolower(stripslashes($_POST['user_id']));
                    $nama = $_POST['user_nama'];
                    $nik = $_POST['user_nik'];
                    $hp = $_POST['user_hp'];
                    $pass = mysqli_real_escape_string($mysqli,$_POST['user_pass']);
                    $pass2 =mysqli_real_escape_string($mysqli, $_POST['user_pass2']);
                    
                    //cek user id sudah ada atau belum
                    $username_result=mysqli_query($mysqli, "SELECT id_usr FROM user_tb WHERE id_usr='$id'");

                    if(mysqli_fetch_array($username_result)){
                        echo "ID user yang anda pilih sudah terdaftar sebelumnya.";
                        die;
                    }

                    //cek password sesuai konfirmasi
                    if($pass!==$pass2){
                        echo "Password tidak sesuai";
                        die;
                    }

                // enkripsi pass
                $pass=password_hash($pass, PASSWORD_DEFAULT);
                    
                

                // Insert user data into table
                    $result = mysqli_query($mysqli, 
                        "INSERT INTO user_tb(id_usr, nama_usr, nik_usr, telp_usr, pass_usr) 
                        VALUES('$id','$nama', '$nik', '$hp', '$pass')"
                    );

                // Show message when user added
                    echo "Pendaftaran Berhasil! <br/>  
                    Silahkan melakukan <a style=\"text-decoration:underline; font-weight:bolder; font-size:larger\" href='login.php'>LOGIN</a>";
                }
           
            

        ?>


</body>
</html>