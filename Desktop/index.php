<?php
session_start();
include_once 'mysql_connect.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/side_navigation.php'; ?>

<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE from donation_items WHERE id=$id";
    mysql_query($sql);
    header('Location: index.php');
}


if(isset($_GET['items'])){
    $added_by = $_SESSION['username'];
    $sql = "SELECT * from donation_items WHERE added_by='$added_by'";
    $result = mysql_query($sql);
}
else if(isset($_GET['category'])){
    $category = $_GET['category'];
    $sql = "SELECT * from donation_items WHERE category='$category'";
    $result = mysql_query($sql);
}
else {
    $sql = "SELECT * from donation_items";
    $result = mysql_query($sql);
}
?>

    <div id="right">
        <div>
            <div style="float: left">
                <h2>Items for Donations:</h2><br>
            </div>
    <div style="float: right">

    <?php if(isset($_SESSION['logged_in'])){
        if(isset($_GET['items'])){ ?>
            <h2><a href="index.php"> View All</a> </h2><br>
        <?php } else {?>
            <h2><a href="index.php?items=<?php echo $_SESSION['username']; ?>"> Your posted items</a> </h2><br>
        <?php }}?>
        </div>

        </div>
        <div style="clear: both;"></div>
        <div>
            <span><b>Categories: &nbsp;</b></span>
            <a href="index.php?category=toys">Toys</a> |
            <a href="index.php?category=cloths">Clothing</a> |
            <a href="index.php?category=cash">Cash</a> |
            <a href="index.php?category=appliances">Home Appliances</a> |
            <a href="index.php?category=books">Books</a>
        </div>
<br>
<br>
        <?php if($result): ?>
        <?php while($row = mysql_fetch_array($result)): ?>
        <div class="item">
            <h3> <a href="item.php?id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </a> </h3>
            <p> <b>Description:</b><?php echo $row['description']; ?>
                <br>
                <br>
                <span><b>Date Added:</b>  <?php echo $row['created_date']; ?>  &nbsp;&nbsp;&nbsp;<b>Country:</b>  <?php echo $row['country']; ?> &nbsp;&nbsp;&nbsp;<b>Added By:</b>  <?php echo $row['added_by']; ?> &nbsp;&nbsp;&nbsp;<b>Category:</b>  <?php echo $row['category']; ?> </span>
            </p>

            <?php if(isset($_SESSION['username']) && $row['added_by']==$_SESSION['username']): ?>
                <span> <a title="Delete this listing" href="index.php?delete=<?php echo $row['id'];?>"> X </a></span>
            <?php endif; ?>

                    </div>
    <?php endwhile; ?>
    <?php else: ?>
            <h2> NO RESULTS FOUND</h2>
    <?php endif; ?>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>