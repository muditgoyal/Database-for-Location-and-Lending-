<html>
<head>
    <link rel="stylesheet" href="../css/site.css">
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <h1>HelpConnect <br><span> Helping needy people all over the globe</span> </h1>
    <nav>
        <ul>
            <li><a href="index.php">DASHBOARD</a></li>
            <li><a href="admin_donation_items.php">DONATION ITEMS</a></li>
            <li><a href="admin_item_requests.php">ITEM REQUESTS</a></li>
            <li><a href="admin_people_requests.php">PEOPLE REQUESTS</a></li>
            <?php if(isset($_SESSION['admin_logged_in'])):?>
                <li> <a href="logout.php"> WELCOME, <?php echo $_SESSION['admin'].'...'; ?> Logout?</a> </li>
            <?php else:?>
            <?php endif;?>
        </ul>
    </nav>
</header>