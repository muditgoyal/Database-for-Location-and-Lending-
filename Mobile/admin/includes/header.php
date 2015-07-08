<html>
<head>
    <link rel="stylesheet" href="../css/site.css">
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
   <center> <h1>HelpConnect <br><span> Helping needy people all over the globe</span> </h1>
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
    </center>
</header>