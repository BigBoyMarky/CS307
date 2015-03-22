<?php
/*
*
* Author: aaron
Date: 3/20/15
*/ 
 require_once "inc/global.inc.php";
$method= $_POST['method'];
$text= $_POST['input'];
$ph = new PostsHandler();
?>


<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Search | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <?php
        $page = $_SERVER['PHP_SELF'];
        include "inc/menu.php";
        ?>
    </div>
    <div id="content">

        <div id="searchpost">
        
       
            <h2>Search Post</h2>
            <form action="<?php echo $PHP_SELF;?>" method="POST">
              
                        
                       Search: <input type="text" name="input" value="<?php echo $input;?>"> 
                       
                            <select name="method">
                                <option value="N">Search By Name</option>
                                <option value="D">Search By Date</option>
                                <option value="L">Search By Location</option>
                            </select>
                    <input type="submit" name = "submit">  
                  
                
                
            </form>
    
        
        </div>
        <div id="list">
            <?php  
if (isset($_POST['submit'])){  
   echo "string";
}
 else{ // list all posts when not submit
  $posts = $ph->fetchallPosts();
   //$len = sizeof($posts);
 //for ($i = 0; $i < $len; $i++) {
//<a href='post.php?id=".$posts[$i]['id']."'>".$posts[$i]['fname']." ".$posts[$i]['lname']."</a>
 //}

 
}

            ?>
            
        </div>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>
