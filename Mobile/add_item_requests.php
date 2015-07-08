<?php
session_start();
if(!$_SESSION['logged_in']){
    header('Location: account.php');
}
include_once 'mysql_connect.php';
$message ='';
if(isset($_POST['add_item'])){
    $item_title = $_POST['item_title'];
    $item_state = $_POST['item_state'];
    $item_city = $_POST['item_city'];
    $item_country = $_POST['item_country'];
    $item_location = $_POST['item_location'];
    $item_category = $_POST['item_category'];
    $item_description = $_POST['item_description'];

    $added_by = $_SESSION['username'];
    $sql = "INSERT into item_requests(title,state,city,country,location,category,description,added_by)
        VALUES ('$item_title','$item_state','$item_city','$item_country','$item_location','$item_category','$item_description','$added_by')";
    mysql_query($sql);
    if(mysql_affected_rows()){
        $message = "Item Request added successfully";
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
        <h2> Request an Item: </h2><br>

        <div id="error">Error! Please check your information.</div>
        <form id="add_item_request" onsubmit=" return ItemRequestValidate();" method="post" action="add_item_requests.php">
            <table>
                <tr>
                    <td>Item Title*</td>
                    <td><input type="text" id="item_title" name="item_title" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>State*</td>
                    <td><input type="text" id="item_state" name="item_state" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>City*</td>
                    <td><input type="text" id="item_city" name="item_city" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Country*</td>
                    <td><input type="text" id="item_country" name="item_country" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><input type="button" id="btnInit" value="Find my location"><input type="hidden" id="hdn" name="item_location" value=""></td>
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
                    <td><select name="item_category" id="item_category">
                            <option value=""> SELECT A CATEGORY</option>
                            <option value="toys"> TOYS</option>
                            <option value="cloths"> CLOTHING</option>
                            <option value="appliances"> HOME APPLIANCES</option>
                            <option value="cash"> CASH</option>
                            <option value="books"> BOOKS </option>
                        </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Description*</td>
                    <td><textarea cols="35" rows="5" name="item_description" id="item_description"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    
                    <td colspan="2" align="center"> 
                        <button type="submit" name="add_item">ADD REQUEST</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>