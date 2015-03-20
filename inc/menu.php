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
            <li><a href="search.php">Search Posts</a></li>
            <?php if(isset($_SESSION['logged_in'])): ?>
                <li><a href="newpost.php">New Post</a></li>
                <li><a href="mypost.php">My<br> Posts</a></li>
            <?php else: ?>
                <div id="hidden">
                    <li><a href="newpost.php">New Post</a></li>
                    <li><a href="mypost.php">My<br> Posts</a></li>
                </div>
            <?php endif; ?>
        </div>
        <div id="right">
            <?php if(!isset($_SESSION['logged_in'])): ?>
                <li><a href="<?php echo $page; ?>" id="myb">SignUp</a></li>
                <li><a href="<?php echo $page;  ?>" id="my-button">Login</a></li>
            <?php else: ?>
                <li><a href="account.php">My Profile</a></li>
                <li><a href="logout.php">Log out</a></li>
            <?php endif; ?>
        </div>
    </ul>

    <div id="element_to_pop_up">
        <a class="b-close">x<a/>
            <form action="" method="POST"><center>
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
            <form action="register.php" method="POST"><center>
                    <h1>Sign Up</h1>
                    <input type = "email" name="email" placeholder="Enter Email Address">
                    <br><br>
                    <input type = "password" name="password" placeholder="Enter Password">
                    <br><br>
                    <input type = "password" name="repeatpassword" placeholder="Re-enter Password">
                    <br><br>
                    <input type = "submit" name="submit" value="Register">
                    <br><br>
                </center></form>
    </div>

</div>
