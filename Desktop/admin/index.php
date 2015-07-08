<?php
session_start();
if(!$_SESSION['admin_logged_in']){
    header('Location: admin_account.php');
}
include_once '../mysql_connect.php';
include_once 'includes/header.php';
?>
<?php
$count_donations = mysql_query("SELECT * from donation_items");
$count_item_requests = mysql_query("SELECT * from item_requests");
$count_people_requests = mysql_query("SELECT * from person_requests");

?>


    <div style="clear:both;"></div>
    <br>

    <div id="content">
        <h2> DASHBOARD</h2>
    <br><br>
    Total Donations:<b> <?php echo mysql_num_rows($count_donations); ?> </b><br><br>
    Total Item requests posted:  <b><?php echo mysql_num_rows($count_item_requests); ?> </b><br><br>
    Total people requests posted:   <b> <?php echo mysql_num_rows($count_people_requests); ?> </b><br><br>

<?php include_once 'includes/footer.php'; ?>