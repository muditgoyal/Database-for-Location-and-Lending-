<?php
session_start();
if(!$_SESSION['admin_logged_in']){
    header('Location: admin_account.php');
}
include_once '../mysql_connect.php'; ?>
<?php include_once 'includes/header.php'; ?>

<?php

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE from item_requests WHERE id=$id";
    mysql_query($sql);
    header('Location: admin_item_requests.php');
}
$sql = "SELECT * from item_requests";
$result = mysql_query($sql);
?>
<?php include_once 'includes/header.php'; ?>

        <div style="clear: both;"></div>
    <br>

    <div id="content">
    <h2> Admin Panel &raquo; Item requests posted by Item Seekers</h2>
        <br>
        <?php while($row = mysql_fetch_array($result)): ?>
            <div class="item">
                <h3> <a href="item_request.php?id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </a> </h3>
                <p> <b>Description:</b><?php echo $row['description']; ?>
                    <br>
                    <br>
                    <span><b>Date Added:</b>  <?php echo $row['date_added']; ?>  &nbsp;&nbsp;&nbsp;<b>Country:</b>  <?php echo $row['state']; ?> &nbsp;&nbsp;&nbsp;<b>Added By:</b>  <?php echo $row['added_by']; ?> &nbsp;&nbsp;&nbsp;<b>Category:</b>  <?php echo $row['category']; ?> </span>
                </p>

                    <span> <a title="Delete this listing" href="admin_item_requests.php?delete=<?php echo $row['id'];?>"> X </a></span>
            </div>
        <?php endwhile; ?>

<?php include_once 'includes/footer.php'; ?>