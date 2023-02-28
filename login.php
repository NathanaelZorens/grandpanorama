<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location:index.php");
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_main.css">
    <link rel="icon" type="image/x-icon" href="assets/main/logo-transparent.ico">
    <title>Login</title>
</head>
<body>
<br>

<a class="backLink" href='index.php'>Back</a>
    <h1>Login</h1>
        <form action="login.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>ID:</td>
                    <td><input type="text"  name="login_id"></td>
                </tr>

                
                <tr>
                    <td>Pass:</td>
                    <td><input type="password" name="login_pass"></td>
                </tr>
                
                
                <tr>
                    <td></td>
                    <td ><input type="submit" name="Login_User" value="Login"></td>
                </tr>
            </table>
        </form>

<p>Belum punya akun? Silahkan melakukan <a style="text-decoration:underline; font-weight:bolder; font-size:larger" href="register_user.php">Registrasi</a></p>

<?php
//session_start();

 // Check If form submitted, insert form data into users table.
if(isset($_POST['Login_User'])) {
    

    $id_log = $_POST['login_id'];
    $pass_log = $_POST['login_pass'];

    //check if empty
    if(!$id_log OR !$pass_log){
        echo "<p>Harap isi sesuai dengan ketentuan</p>";
    } 

    else {

        // include database connection file
        include_once("config.php");
        // Insert user data into table



        //$result = mysqli_query($mysqli, "SELECT cast(userid as VARCHAR(100)), cast(aes_decrypt(userpass, userkey) as VARCHAR(100)), cast(userstatus as VARCHAR(100)) FROM `users` WHERE username='$u_n'");
        //$queryResults = mysqli_num_rows($result);
        
        $result = mysqli_query($mysqli, "SELECT *  FROM user_tb WHERE id_usr='$id_log'");
        $queryResults = mysqli_num_rows($result);   


        /*$result2 = mysqli_query($mysqli, "SELECT 
                                    id_usr, 
                                    pass_usr 
                                FROM `user_tb` WHERE id_usr='$id_log'");*/
        if ($queryResults===1) {
            $row = mysqli_fetch_assoc($result);
            //$row2 = mysqli_fetch_array($result2);
            //$username=$row2['id_usr'];
            $userStatus = $row['status_usr'];
                
                if (password_verify($pass_log, $row['pass_usr'])===true){
                    
                    //echo "<p class=\"confirmText\">Heyheyhey</p>";
                    //set session
                    $_SESSION["login"]=true;
                    $_SESSION["activeUser"]=$id_log;
                    $_SESSION["activeUserStatus"]=$userStatus;
                    //pindah ke Index
                    header("Location:mypage_user.php");
                    exit;
                    //echo "<a href=\"index.php  \">Click Here</a>";


                }

                else {
                    echo "<p class=\"alertText\">Sorry, please try again</p>";
                }

            }
        

        else{
            echo "user ID tidak ditemukan, baru di sini?";
        }    
    }
} 

?>   

</body>
</html>