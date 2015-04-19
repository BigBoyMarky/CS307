<?php
    require_once "inc/global.inc.php";
?>

<!doctype html>

<html>
<head>
<title>
Person or Pet?
</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="pp.js"></script>
</head>
<body>
    <div id = "content">

    <div id="wrapper">
    <div id="header">
        <?php
        $page = $_SERVER['PHP_SELF'];
        include "inc/menu.php";
        ?>
    </div>
    </div>
	
	<br/>
	<br/>
	<br/>
	<br/>
	<center>
		<h1>
		Select Person or Pets
		</h1>
	</center>
	<br/>
	<br/>
	<br/>
	<div id = "two_buttons">
		<div id = "person_button">
			<input type = "image" id = "person_b_button" src = "images/placement/placementmale.jpg"/>
		</div>
		<div id = "pet_button">
			<input type = "image" id = "pet_b_button" src = "images/placement/placementdog.jpg"/>
		</div>
	</div>
<div id="footer">
<?php include "inc/footer.php"; ?>
</div>
	</div>
</body>
</html>