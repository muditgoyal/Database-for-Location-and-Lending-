<?php
include_once 'mysql_connect.php';
$message ='';
if(isset($_POST['contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "INSERT INTO reports(name,email,subject,message) VALUES('$name','$email','$subject','$message')";
    mysql_query($sql);
    if(mysql_affected_rows()){
        $message = 'Your Message was Received Successfully';
    }
    else {
        $message = " A problem occurred. try again later";
    }
}
?>
<?php
include_once 'includes/header.php';
?>
    <div style="clear:both;"></div>
    <br>

    <div id="content">
        <h2> Report Us your problems</h2><br><br>
        <div id="error">Error! Please check your information.</div>
        <div id=""><?php echo $message; ?></div><br><br>
        <form action="contact_us.php" method="post" onsubmit="return ContactValidate();" id="contact">
<table>
            <tr>
                <td>Name*</td>
                <td><input type="text" name="name" id="name" size="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Email*</td>
                <td><input type="email" name="email" id="email" size="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Subject*</td>
                <td><input type="text" name="subject" id="subject" size="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Your Message*</td>
                <td><textarea rows="10" cols="30" name="message" id="message"></textarea></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button type="submit" name="contact">SUBMIT INQUIRY</button></td>
            </tr>
</table>
        </form>
<?php include_once 'includes/footer.php'; ?>