<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 4:50 PM
 */
require_once "inc/global.inc.php";
if (!isset($_SESSION['logged_in']))  {
    header("Location: index.php");
}
$petName = "";
$age = "";
$species= "";
$contactNumber = "";
$emailAddress = "";
$additionalInfo = "";
$ph = new PetPostsHandler();
$post = $ph->fetchPost($_GET['id']);
if (isset($_POST['submit'])) {
    $petName = $_POST['petName'];
    $age = $_POST['age'];
    $species = $_POST['species'];
    $contactNumber = $_POST['contactNumber'];
    $emailAddress = $_POST['emailAddress'];
    $location = $_POST['location'];
    $additionalInfo = $_POST['additionalInfo'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!
    $data = array();
    $data['petName'] = $petName;
    $data['age'] = $age;
    $data['species'] = $species;
    $data['contactNumber'] = $contactNumber;
    $data['emailAddress'] = $emailAddress;
    $data['additionalInfo'] = $additionalInfo;
    $data['userID'] = $user->id;
    $data['location'] = $location;
    $data['id'] = $_GET['id'];
    $id = $ph->editPost($data);
    header("Location: post.php?id=".$data['id']);
}
?>






<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Edit pet Post | Mippsy
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
        <div id="editpost">
        <br><br>
        <center>
            <h2>Edit Post</h2>
            <form action="" method="POST">
                <table>
                    
                    <tr>
                        <td>Pet Name:</td>
                        <td><input type="text" name="petName" value="<?php echo $post->petName;?>"></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>
                            <select name="age">
                            	<option selected="selected">
                            		<?php echo $post->age; ?>
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
                        <td>Species:</td>
                        <td><input type="text" name="species" value="<?php echo $post->species;?>"></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td>
                            <select name="location" required>
                            	<option selected="selected">
                            		<?php echo isset($_POST['location']) ? $_POST['location'] : 'ALABAMA'; ?>
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
                        <td><input type="text" name="contactNumber" value="<?php echo $post->contactNumber;?>"></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type="email" name="emailAddress" value="<?php echo $post->emailAddress; ?>"></td>
                    </tr>
                    <tr>
                        <td>Additional Information:</td>
                        <td><textarea name="additionalInfo" rows="8" cols="50"><?php echo $post->additionalInfo;?></textarea></td>
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