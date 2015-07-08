<html>
<head>
    <link rel="stylesheet" href="css/site.css">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });
	</script>
</head>
<body>
<header>
<center>
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
    </center>
</header>