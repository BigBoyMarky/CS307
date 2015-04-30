<?php
/**
 * Author: jay
 * Date: 2/27/15
 * Time: 10:20 PM
 */
?>

<a href = "index.php"><img id = "logo" src = "images/mippsy.png"></a>

<div id="navbar">
    <ul>
        <div id="left">
            <li><a href="search.php">Search<br> Posts</a></li>
            <li><a href="pp2.php">All<br> Posts</a></li>
            <?php if(isset($_SESSION['logged_in'])): ?>
                <li><a href="pp.php">New<br> Post</a></li>
                <li><a href="mypost.php">My<br> Posts</a></li>
            <?php else: ?>
                <div id="hidden">
                    <li><a href="pp.php">New Post</a></li>
                    <li><a href="mypost.php">My<br> Posts</a></li>
                </div>
            <?php endif; ?>
        </div>
        <div id="right">
            <?php if(!isset($_SESSION['logged_in'])): ?>
                <li><a href="signup.php"><img src = "images/signup.png" /></a></li>
                <li><a href="<?php echo $page;  ?>" id="my-button"><img src = "images/login.png" /></a></li>
            <?php else: ?>
                <!--<li><a href="account.php">My Profile</a></li>-->
                <li><a href="account.php"><img src = "images/myaccount.png" /></a></li>
                <li><a href="mymessages.php"><img src = "images/messages.png" /></a></li>
                <li><a href="logout.php"><img src = "images/logout.png" /></a></li>
            <?php endif; ?>
        </div>
    </ul>

    <div id="element_to_pop_up">
        <a class="b-close">x<a/>
            <form action="" method="POST" onSubmit="return false;"><center>
                    <h1>Login to Mippsy</h1>
                    <div id="error"></div>
                    <br><br>
                    <input type = "email" name="email" id='email' placeholder="Enter Email Address">
                    <br><br>
                    <input type = "password" name="password" id='password' placeholder="Enter Password">
                    <br><br>
                    <input type="submit" name="submit" value="Login" id=login>
                    <br><br>
                </center></form>
    </div>


    <div id="element2_to_pop_up">
        <a class="b-close">x<a/>
            <form action="" method="POST"><center>
                    <h1>Sign Up</h1>
                    <div id="error2"></div>
                    <br><br>
                    <input type = "email" name="email" id="suemail" placeholder="Enter Email Address" >
                    <br><br>
                    <input type = "password" name="password" id="supw" placeholder="Enter Password" >
                    <br><br>
                    <input type = "password" name="repeatpassword" id="surpw" placeholder="Re-enter Password">
                    <br><br>
                    <input type = "submit" name="submit" value="Register" id="subtn">
                    <br><br>
                </center></form>
    </div>

</div>