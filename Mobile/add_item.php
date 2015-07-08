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
if(isset($_POST['add_item'])){
    $item_title = $_POST['item_title'];
    $item_state = $_POST['item_state'];
    $item_city = $_POST['item_city'];
    $item_country = $_POST['item_country'];
    $item_location = $_POST['item_location'];
    $item_category = $_POST['item_category'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];
    $item_description = $_POST['item_description'];

    $file_name = $_FILES['item_image']['name'];
    $file_type = $_FILES['item_image']['type'];
    $tmp_file_at_server = $_FILES['item_image']['tmp_name'];
    $item_image = $file_name;

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }
    if (is_uploaded_file($tmp_file_at_server))
        move_uploaded_file($tmp_file_at_server, 'uploads/'.$item_image);

    $added_by = $_SESSION['username'];
    $sql = "INSERT into donation_items(title,state,city,country,location,category,price,quantity,image,description,added_by)
        VALUES ('$item_title','$item_state','$item_city','$item_country','$item_location','$item_category','$item_price','$item_quantity','$item_image','$item_description','$added_by')";
    $rs = mysql_query($sql);
   if(mysql_affected_rows() == 1){
       $message = "Item for donation added successfully";
   }
    else {
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
        <h2> Add new Item for Donation:</h2><br>

        <div id="error">Error! Please check your information.</div>
        <form id="add_item" onsubmit=" return Validate();" method="post" action="add_item.php" enctype="multipart/form-data">
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
                    <td><input type="button" id="btnInit" value="Find my location"><input type="hidden" id="hdn" name="item_location"></td>
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
                    <td>Price*</td>
                    <td><input type="number" id="item_price" name="item_price" value="0" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Quantity*</td>
                    <td><input type="number" id="item_quantity" name="item_quantity" size="20"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Add an Image(Optional)</td>
                    <td><input type="file" name="item_image" size="15"></td>
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
                        <button type="submit" name="add_item" >ADD NEW ITEM</button>
                    </td>
                </tr>
            </table>
        </form>
        <div id="result"></div>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>