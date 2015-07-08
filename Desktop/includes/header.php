<html>
<head>
    <link rel="stylesheet" href="css/site.css">
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <h1>HelpConnect <br><span> Helping needy people all over the globe</span> </h1>
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about_us.php">ABOUT US</a></li>
            <li><a href="contact_us.php">CONTACT US</a></li>
            <?php if(isset($_SESSION['logged_in'])):?>
                <li> <a href="logout.php"> WELCOME, <?php echo $_SESSION['username'].'...'; ?> Logout?</a> </li>
            <?php else:?>
            <li><a href="account.php">CREATE NEW ACCOUNT</a></li>
            <li><a href="account.php">SIGN IN</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>