<?php
session_start();
include_once 'mysql_connect.php';
$error ='';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) &&  !empty($password)){
        $password = md5($password);
        $sql = "SELECT * from clients WHERE username = '$username' AND password = '$password'";
        $rs = mysql_query($sql);
        $user = mysql_fetch_array($rs);
        if($user){
            var_dump($user);
            $_SESSION['username']= $user['username'];
            $_SESSION['logged_in']=true;
            header('Location: index.php');
        }
        else{
            $error = "Invalid Username or Password";
        }
    }
    else{
        $error = "Please fill all fields";
    }
}

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    if(!empty($username) &&  !empty($password) && !empty($phone)){
        $password = md5($password);
    $sql = "INSERT INTO clients(username,password,phone) VALUES('$username','$password','$phone')";
        $rs = mysql_query($sql);
        if(!$rs){
            $error = mysql_error();
        }
        else{
            $error = "Account Created Successfully";
        }
    }
    else {
        $error = "Please fill all fields";
    }
}
?>

<?php include_once 'includes/header.php'; ?>
<div style="clear:both;"></div>
<br>
<div id="content">
<div id="error2" style="text-align: center"> <?php echo $error; ?></div>
    <div class="account-left">
        <h2>Register a new Client Account:</h2><br>
        <p>By registering the account, you can add several items to donate and request others on the website</p><br>
       <form action="account.php" method="post">
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
                <td>Phone*</td>
                <td><input type="text" name="phone" size="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <button type="submit" name="register"> Register</button>
                </td>
            </tr>
        </table>
        </form>

    </div>

    <div class="account-right">
        <h2>Already Have an account? Login!</h2><br>
        <p>Login to your account to view and delete the listing and request added by you.</p><br>
        <form action="account.php" method="post">
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
        <br><br>
        <p>If you have an admin Account. <a href="admin/admin_account.php">Click Here</a></p>

    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>