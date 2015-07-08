<?php
session_start();
if(!$_SESSION['logged_in']){
    header('Location: account.php');
}
?>

<?php
try{
    require_once 'mysql_connect.php';
}catch(Exception $e){
    $error = $e->getMessage();
}
?>
<?php
$message ='';
if(isset($_POST['add_person'])){
    $person_title = $_POST['person_title'];
    $person_state = $_POST['person_state'];
    $person_city = $_POST['person_city'];
    $person_country = $_POST['person_country'];
    $person_location = $_POST['person_location'];
    $person_category = $_POST['person_category'];
    $person_description = $_POST['person_description'];


    $added_by = $_SESSION['username'];
    $sql = "INSERT into
person_requests(name,state,city,country,location,category,description,added_by)
        VALUES ('$person_title','$person_state','$person_city','$person_country','$person_location','$person_category','$person_description','$added_by')";
    mysql_query($sql);
    if(mysql_affected_rows()){
        $message = "Person Request added successfully";
    }
    else{
        $message = "A problem occurred. Please check if you entered all valid details ";
    }
}
?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/side_navigation.php'; ?>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/geo.js"></script>
<script src="js/google_location.js"></script>

    <div id="right">

        <div style="color: red; padding: 10px"> <?php echo $message; ?></div>
        <h2> Add new Person Request:</h2><br>

        <div id="error">Error! Please check your information.</div>
        <form id="add_person" onsubmit="return PersonValidate();" method="post" action="add_person_request.php">
            <table>
                <tr>
                    <td>Person Name*</td>
                    <td><input type="text" id="person_title" name="person_title" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>State*</td>
                    <td><input type="text" id="person_state" name="person_state" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>City*</td>
                    <td><input type="text" id="person_city" name="person_city" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Country*</td>
                    <td><input type="text" id="person_country" name="person_country" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Location*</td>
                    <td><input type="button" id="btnInit" value="Find my location"><input type="hidden" id="hdn" name="person_location" value=""></td>
                </tr>
                <tr>
                	<td colspan="2" id="map1"></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Category*</td>
                    <td><select name="person_category" id="person_category">
                            <option value=""> SELECT A CATEGORY</option>
                            <option value="friend"> Friend</option>
                            <option value="family"> Family Member</option>
                            <option value="doctor"> Doctor</option>
                            <option value="engineer"> Engineer</option>
                        </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Description or other details*</td>
                    <td><textarea cols="35" rows="5" name="person_description" id="person_description"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    
                    <td colspan="2" align="center">
                        <button type="submit" name="add_person">ADD PERSON REQUEST</button>
                    </td>
                </tr>
            </table>
        </form>
        <div id="result"></div>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>