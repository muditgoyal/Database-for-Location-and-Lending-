<?php
session_start();

include_once 'mysql_connect.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/side_navigation.php'; ?>

<?php
$show_delete_option= false;
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE from person_requests WHERE id= $id";
    $result = mysql_query($sql);
        header('Location: people_requests.php');
}

if(isset($_GET['items'])){
    $added_by = $_GET['items'];
    $sql = "SELECT * from person_requests WHERE added_by='$added_by'";
    $result = mysql_query($sql);
}
else if(isset($_GET['category'])){
    $category =  $_GET['category'];
        $sql = "SELECT * from person_requests WHERE category='$category'";
    $result = mysql_query($sql);
    }
    else {
        $sql = "SELECT * from person_requests";
        $result = mysql_query($sql);

    }
?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/side_navigation.php'; ?>

    <div id="right">
        <div>
            <div style="float: left">
                <h2>Item Requests by Item seekers:</h2><br>
            </div>
				<br />
            <br />
            <br />
            <?php if(isset($_SESSION['logged_in'])){
                if(isset($_GET['items'])){ ?>
                    <div style="float: left">
                        <h2><a href="people_requests.php"> View All</a> </h2><br>
                    </div>
                <?php } else {?>
                    <div style="float: left">
                        <h2><a href="people_requests.php?items=<?php echo $_SESSION['username']; ?>"> Your posted requests</a> </h2><br>
                    </div>
                <?php }}?>


        </div>

        <div style="clear: both;"></div>
        <div>
            <span><b>Categories: &nbsp;</b></span>
            <a href="people_requests.php?category=friend">Friend</a> |
            <a href="people_requests.php?category=family">Family Members</a> |
            <a href="people_requests.php?category=doctor">Doctors</a> |
            <a href="people_requests.php?category=engineer">Engineers</a>
        </div>
<br>
        <?php while($row = mysql_fetch_array($result)): ?>
            <div class="item">
                <h3> <a href="people_request.php?id=<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </a> </h3>
                <p> <b>Description:</b><?php echo $row['description']; ?>
                    <br>
                    <br>
                    <span><b>Date Added:</b>  <?php echo $row['date_created']; ?>  &nbsp;&nbsp;&nbsp;<b>Country:</b>  <?php echo $row['country']; ?> &nbsp;&nbsp;&nbsp;<b>Added By:</b>  <?php echo $row['added_by']; ?> &nbsp;&nbsp;&nbsp;<b>Category:</b>  <?php echo $row['category']; ?> </span>
                </p>

                <?php if(isset($_SESSION['username']) && $row['added_by']==$_SESSION['username']): ?>
                    <span> <a title="Delete this listing" href="people_requests.php?delete=<?php echo $row['id'];?>"> X </a></span>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>