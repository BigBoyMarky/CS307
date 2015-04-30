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
$location= "";
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
    $location = $_POST['location'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!

    $data = array();
    $data['fname'] = $fname;
    $data['lname'] = $lname;
    $data['location'] = $location;
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

function write_info(){
    echo   " <table>
              <tr>
                  <td>First Name:</td>";
    echo                   "<td><input type=\"text\" name=\"fname\"></td>";
    echo                   "</tr>
              <tr>
                  <td>Last Name:</td>";
    echo                       "<td><input type=\"text\" name=\"lname\"></td>";
    echo        "</tr>
                 <tr>
                        <td>State:</td>
                        <td>
                            <select name=\"location\">";
    echo     "<option selected=\"selected\">";
    echo isset($_POST['location']) ? $_POST['location'] : 'ALABAMA';
              echo                "</option>";
                  echo           "<option value=\"ALABAMA\">Alabama</option>";
                                  echo"<option value=\"ALASKA\">Alaska</option>";
                                  echo"<option value=\"ARIZONA\">Arizona</option>";
                                  echo"<option value=\"ARKANSAS\">Arkansas</option>";
                                  echo"<option value=\"CALIFORNIA\">California</option>";
                                  echo"<option value=\"COLORADO\">Colorado</option>";
                                  echo"<option value=\"CONNECTICUT\">Connecticut</option>";
                                  echo"<option value=\"DELAWARE\">Delaware</option>";
                                  echo"<option value=\"COLUMBIA\">District Of Columbia</option>";
                                  echo"<option value=\"FLORIDA\">Florida</option>";
                                  echo"<option value=\"GEORGIA\">Georgia</option>";
                                  echo"<option value=\"HAWAII\">Hawaii</option>";
                                  echo"<option value=\"IDAHO\">Idaho</option>";
                                  echo"<option value=\"ILLINOIS\">Illinois</option>";
                                  echo"<option value=\"INDIANA\">Indiana</option>";
                                  echo"<option value=\"IOWA\">Iowa</option>";
                                  echo"<option value=\"KANSAS\">Kansas</option>";
                                  echo"<option value=\"KENTUCKY\">Kentucky</option>";
                                  echo"<option value=\"LOUISIANA\">Louisiana</option>";
                                  echo"<option value=\"MAINE\">Maine</option>";
                                  echo"<option value=\"MARYLAND\">Maryland</option>";
                                  echo"<option value=\"MASSACHUSETTS\">Massachusetts</option>";
                                  echo"<option value=\"MICHIGIN\">Michigan</option>";
                                  echo"<option value=\"MINNESOTA\">Minnesota</option>";
                                  echo"<option value=\"MISSISSIPPI\">Mississippi</option>";
                                  echo"<option value=\"MISSOURI\">Missouri</option>";
                                  echo"<option value=\"MONTANA\">Montana</option>";
                                  echo"<option value=\"NEBRASKA\">Nebraska</option>";
                                  echo"<option value=\"NEVADA\">Nevada</option>";
                                  echo"<option value=\"NEW HAMPSHIRE\">New Hampshire</option>";
                                  echo"<option value=\"NEW JERSEY\">New Jersey</option>";
                                  echo"<option value=\"NEW MEXICO\">New Mexico</option>";
                                  echo"<option value=\"NEW YORK\">New York</option>";
                                  echo"<option value=\"NORTH CAROLINA\">North Carolina</option>";
                                  echo"<option value=\"NORTH DAKOTA\">North Dakota</option>";
                                  echo"<option value=\"OHIO\">Ohio</option>";
                                  echo"<option value=\"OKLAHOMA\">Oklahoma</option>";
                                  echo"<option value=\"OREGON\">Oregon</option>";
                                  echo"<option value=\"PENNSYLVANIA\">Pennsylvania</option>";
                                  echo"<option value=\"RHODE ISLAND\">Rhode Island</option>";
                                  echo"<option value=\"SOUTH CAROLINA\">South Carolina</option>";
                                  echo"<option value=\"SOUTH DAKOTA\">South Dakota</option>";
                                  echo"<option value=\"TENNESSEE\">Tennessee</option>";
                                  echo"<option value=\"TEXAS\">Texas</option>";
                                  echo"<option value=\"UTAH\">Utah</option>";
                                  echo"<option value=\"VERMONT\">Vermont</option>";
                                  echo"<option value=\"VIRGINIA\">Virginia</option>";
                                  echo"<option value=\"WASHINGTON\">Washington</option>";
                                  echo"<option value=\"WEST VIRGINIA\">West Virginia</option>";
                                  echo"<option value=\"WISCONSIN\">Wisconsin</option>";
                                  echo"<option value=\"WYOMING\">Wyoming</option>";
      echo     "</select>
                </tr>
              <tr>
                  <td>Age:</td>
                  <td>";
      echo                            "<select name=\"age\">";

      for($value = 1; $value < 120; $value++) {
          echo '<option value = "'.$value.'">'.$value.'</option>';
      }

      echo "                           </select>
                  </td>
              </tr>
              <tr>
                  <td>Gender:</td>
                  <td>";
      echo "                           <select name=\"gender\">
                          <option value=\"M\">Male</option>
                          <option value=\"F\">Female</option>";
      echo "                           </select>
                  </td>
              </tr>
              <tr>
                  <td>Contact Number:</td>
                  <td><input type=\"text\" name=\"contactNumber\"></td>
              </tr>
              <tr>
                  <td>Additional Information:</td>
                  <td><textarea name=\"additionalInfo\" rows=\"8\" cols=\"50\"></textarea></td>
              </tr>
          </table>
            ";

}

function write_pic(){
    echo " <div id=\"maindiv\">
<h2>Multiple Image Upload Form</h2>
<form enctype=\"multipart/form-data\" action=\"\" method=\"post\">
First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB.
<div id=\"filediv\"><input name=\"file[]\" type=\"file\" id=\"file\"/></div>
<input type=\"button\" id=\"add_more\" class=\"upload\" value=\"Add More Files\"/>
<input type=\"submit\" value=\"Upload File\" name=\"submit\" id=\"upload\" class=\"upload\"/>
</form>
</div>";

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
    <link rel="stylesheet" type="text/css" href="css/upload.css">
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
                    <?php
                    write_info();
                    write_pic() ;
                    ?>

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