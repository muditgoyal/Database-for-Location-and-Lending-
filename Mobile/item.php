<?php
session_start();
include_once 'mysql_connect.php'; ?>
<?php
$message='';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from donation_items WHERE id= $id";
    $rs = mysql_query($sql);
    $item = mysql_fetch_object($rs);
}?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/side_navigation.php'; ?>

    <div id="right">
        <div style="color: red; padding: 10px"> <?php echo $message; ?></div>
        <?php

        if ($item) {
            echo '<p><b> Title: </b>'.$item->title.'</p><br>';
            if ($item->image) {
                ?>
                <p style="max-width:600px; float:left;"><img height="220" width="220" src="uploads/<?php echo $item->image; ?>">
                <br />
                <img height="220" width="220" src="<?php echo $item->location; ?>">
                </p>
            <?php
            }

            echo '<br><p><b> Country: </b>'.$item->state.'</p><br>';
            echo '<p><b> City: </b>'.$item->city.'</p><br>';
            echo '<p><b> Country: </b>'.$item->country.'</p><br>';
            echo '<p><b> Price: </b>'.$item->price.'</p><br>';
            echo '<p><b> Quantity: </b>'.$item->quantity.'</p><br>';
            echo '<p><b> Description: </b>'.$item->description.'</p><br>';
            echo '<p><b> Category: </b>'.$item->category.'</p><br>';
            echo '<p><b> Added by: </b>'.$item->added_by.'</p><br>';
            echo '<p><b> Created Date: </b>'.$item->created_date.'</p>';

        } else {
            echo '<h2> No record found...</h2>';
        }
        ?>
    </div>
<?php mysql_close($db); ?>
<?php include_once 'includes/footer.php'; ?>