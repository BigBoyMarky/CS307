<?php
    require_once "inc/global.inc.php";
    if (isset($_SESSION['logged_in'])) {
        header("Location: index.php");
    }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatpassword = $_POST['repeatpassword'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contactNumber = $_POST['contactNumber'];
        $state = $_POST['state'];
        $success = true;
        $err = "";
        $uh = new UserHandler();
        if ($uh->checkDuplicate($email)) {
            $success = false;
            $err = "Email Address is taken.";
        }
        if (strcmp($password, $repeatpassword)) {
            $success = false;
            $err = "Password does not match.";
        }
        if ($success) {
            $data = array();
            $data['email'] = $email;
            $data['password'] = md5($password);
            $data['fname'] = $_POST['fname'];
            $data['lname'] = $_POST['lname'];
            $data['age'] = $_POST['age'];
            $data['gender'] = $_POST['gender'];
            $data['contactNumber'] = $_POST['contactNumber'];
            $data['state'] = $_POST['state'];
            $uh->signup($data);
            $data['id'] = unserialize($_SESSION['user'])->id;
            $usr = new User($data);
            $usr->save();
            header("Location: index.php");
        } else {
            $failed = "Sign Up Failed";
            $failed .= "<br>";
            $failed .= $err;
        }
   }
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Edit profile | Mippsy
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
        <div id="newpost">
        <br><br>
        <center>
            <h2>Sign Up</h2>
            <br>
            <div>
            	<?php echo isset($failed) ? $failed : "";?>
            </div>
            <br>
            <form action="signup.php" method="POST">
                <table>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Repeat Password:</td>
                        <td><input type="password" name="repeatpassword" required></td>
                    </tr>
                    
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lname"  value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>
                            <select name="age" required>
                                <option selected="selected">
                                    <?php echo isset($_POST['age']) ? $_POST['age'] : 1; ?>
                                </option>
                                <?php
                                    for($value = 1; $value < 120; $value++) {
                                        echo '<option value = "'.$value.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <select name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td>
                            <select name="state" required>
                            	<option selected="selected">
                            		<?php echo isset($_POST['state']) ? $_POST['state'] : 'ALABAMA'; ?>
                            	</option>
                                <option value="ALABAMA">Alabama</option>
                                <option value="ALASKA">Alaska</option>
                                <option value="ARIZONA">Arizona</option>
                                <option value="ARKANSAS">Arkansas</option>
                                <option value="CALIFORNIA">California</option>
                                <option value="COLORADO">Colorado</option>
                                <option value="CONNECTICUT">Connecticut</option>
                                <option value="DELAWARE">Delaware</option>
                                <option value="COLUMBIA">District Of Columbia</option>
                                <option value="FLORIDA">Florida</option>
                                <option value="GEORGIA">Georgia</option>
                                <option value="HAWAII">Hawaii</option>
                                <option value="IDAHO">Idaho</option>
                                <option value="ILLINOIS">Illinois</option>
                                <option value="INDIANA">Indiana</option>
                                <option value="IOWA">Iowa</option>
                                <option value="KANSAS">Kansas</option>
                                <option value="KENTUCKY">Kentucky</option>
                                <option value="LOUISIANA">Louisiana</option>
                                <option value="MAINE">Maine</option>
                                <option value="MARYLAND">Maryland</option>
                                <option value="MASSACHUSETTS">Massachusetts</option>
                                <option value="MICHIGAN">Michigan</option>
                                <option value="MINNESOTA">Minnesota</option>
                                <option value="MISSISSIPPI">Mississippi</option>
                                <option value="MISSOURI">Missouri</option>
                                <option value="MONTANA">Montana</option>
                                <option value="NEBRASKA">Nebraska</option>
                                <option value="NEVADA">Nevada</option>
                                <option value="NEW HAMPSHIRE">New Hampshire</option>
                                <option value="NEW JERSEY">New Jersey</option>
                                <option value="NEW MEXICO">New Mexico</option>
                                <option value="NEW YORK">New York</option>
                                <option value="NORTH CAROLINA">North Carolina</option>
                                <option value="NORTH DAKOTA">North Dakota</option>
                                <option value="OHIO">Ohio</option>
                                <option value="OKLAHOMA">Oklahoma</option>
                                <option value="OREGON">Oregon</option>
                                <option value="PENNYSYLVANIA">Pennsylvania</option>
                                <option value="RHODE ISLAND">Rhode Island</option>
                                <option value="SOUTH CAROLINA">South Carolina</option>
                                <option value="SOUTH DAKOTA">South Dakota</option>
                                <option value="TENNESSEE">Tennessee</option>
                                <option value="TEXAS">Texas</option>
                                <option value="UTAH">Utah</option>
                                <option value="VERMONT">Vermont</option>
                                <option value="VIRGINIA">Virginia</option>
                                <option value="WASHINGTON">Washington</option>
                                <option value="WEST VIRGINIA">West Virginia</option>
                                <option value="WISCONSIN">Wisconsin</option>
                                <option value="WYOMING">Wyoming</option>
                            </select>               
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number:</td>
                        <td><input type="text" name="contactNumber" value="<?php echo isset($_POST['contactNumber']) ? $_POST['contactNumber'] : ''; ?>" required></td>
                    </tr>
           
                </table>
                <input type="submit" value="Submit" name="submit">
            </form>
        </center>
        <br><br><br>
        </div>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>