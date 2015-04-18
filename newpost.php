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
$fname = "";
$lname = "";
$age = "";
$gender= "";
$contactNumber = "";
$emailAddress = "";
$additionalInfo = "";

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $additionalInfo = $_POST['additionalInfo'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!

    $data = array();
    $data['fname'] = $fname;
    $data['lname'] = $lname;
    $data['age'] = $age;
    $data['gender'] = $gender;
    $data['contactNumber'] = $contactNumber;
    $data['emailAddress'] = $emailAddress;
    $data['additionalInfo'] = $additionalInfo;
    $data['userID'] = $user->id;
    $ph = new PostsHandler();
    $id = $ph->createPost($data);

    $target_path = "uploads/posts/".$id."/";


    if(!file_exists($target_path)){ //if dir not exist make one.

          mkdir($target_path, 0777, true);    
    }

    $j = 0;     // Variable for indexing uploaded image.

    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
         $target_path = "uploads/posts/".$id."/";

     // Loop to get individual element from the array
     $validextensions = array(".jpeg", ".jpg", ".png");      // Extensions which are allowed.
     $file_extension = strstr( $_FILES["file"]["name"][$i], ".");
   
     $target_path = $target_path . $_FILES["file"]["name"][$i];  // Set the target path with a new name of image.
   
     $j = $j + 1;      // Increment the number of uploaded images according to the files in array.



if (($_FILES["file"]["size"][$i] < 20000000)     // Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)){
      
      
if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {

// If file moved to uploads folder.
//echo $j. ').<span >Image uploaded successfully!.</span><br/><br/>';

}else
{
//echo $j. ').<span id="error">please try again!.</span><br/><br/>';
 }


  }
} 

    if ($id) {
        header("Location: post.php?id=$id");
    }
}
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        New Post | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="script.js"></script>
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
            <h2>Create New Post</h2>
            <form action="newpost.php" enctype="multipart/form-data" method="POST">
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="fname"></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lname"></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>
                            <select name="age">
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
                        <td>Contact Number:</td>
                        <td><input type="text" name="contactNumber"></td>
                    </tr>
                    <tr>
                        <td>Additional Information:</td>
                        <td><textarea name="additionalInfo" rows="8" cols="50"></textarea></td>
                    </tr>
                </table>
               <center> First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB. </center>
               <input name="file[]" type="file" id="file"/>
               <input type="button" id="add_more" class="upload" value="Add More Files"/>
               <input type="submit" value="Submit" name="submit">
            </form>
        </center>
        <br><br><br>

        </div>
    </div>
    <div id="footer">

    </div>
</div>
</body>

</html>
