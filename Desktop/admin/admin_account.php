<?php
session_start();
include_once '../mysql_connect.php';
$error ='';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) &&  !empty($password)){
        $password = md5($password);
        $sql = "SELECT * from admin WHERE username = '$username' AND password = '$password'";
        $rs = mysql_query($sql);
        $user = mysql_fetch_array($rs);
            if($user){
                $_SESSION['admin'] = $user['username'];
                $_SESSION['admin_logged_in'] = true;
                header('Location:index.php');
            }
    }
    else{
        $error = "Please fill all fields";
    }
}

?>

<?php include_once 'includes/header.php'; ?>
    <div style="clear:both;"></div>
    <br>
<div id="content">
    <div id="error2" style="text-align: center"> <?php echo $error; ?></div>

    <div class="" style="margin: 0 auto;">
        <h2>Have an Admin account? Login!</h2><br>
        <p>Login to your account. For Contact email at: admin@helpconnect.com</p><br>
        <form action="admin_account.php" method="post">
            <table>
                <tr>
                    <td>Username*</td>
                    <td><input type="text" name="username" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Password*</td>
                    <td><input type="password" name="password" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <button type="submit" name="login"> Login</button>
                    </td>
                </tr>
            </table>
        </form>


    </div>
<?php include_once 'includes/footer.php'; ?>