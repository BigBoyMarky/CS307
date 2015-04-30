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
$location= "";
$contactNumber = "";
$emailAddress = "";
$additionalInfo = "";

if (isset($_POST['submit'])) {
     $petName = $_POST['petName'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $species = $_POST['species'];
    $contactNumber = $_POST['contactNumber'];
    $additionalInfo = $_POST['additionalInfo'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!

     $data = array();
    $data['petName'] = $petName;
    $data['location'] = $location;
    $data['age'] = $age;
    $data['species'] = $species;
    $data['contactNumber'] = $contactNumber;
    $data['emailAddress'] = $emailAddress;
    $data['additionalInfo'] = $additionalInfo;
    $data['userID'] = $user->id;
    $ph = new PetPostsHandler();
    $id = $ph->createPost($data);

    $target_path = "uploads/petposts/".$id."/";


    if(!file_exists($target_path)){ //if dir not exist make one.

        mkdir($target_path, 0777, true);
    }

    $j = 0;     // Variable for indexing uploaded image.

    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $target_path = "uploads/petposts/".$id."/";

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
        header("Location: petpost.php?id=$id");
    }
}

function write_info(){
     echo   " <table>
              <tr>
                  <td>petName:</td>";
      echo                   "<td><input type=\"text\" name=\"petName\"></td>";
      echo        "</tr> 
      			<tr>
                  <td>species:</td>";
      echo                   "<td><input type=\"text\" name=\"species\"></td>";
      echo "</tr>
                 <tr>
                        <td>State:</td>
                        <td>
                            <select name=\"location\">";
                            echo     "<option selected=\"selected\">";
    echo isset($_POST['location']) ? $_POST['location'] : 'ALABAMA';
              echo                "</option>";
                  echo           "<option value=\"AL\">Alabama</option>";
                                  echo"<option value=\"AK\">Alaska</option>";
                                  echo"<option value=\"AZ\">Arizona</option>";
                                  echo"<option value=\"AR\">Arkansas</option>";
                                  echo"<option value=\"CA\">California</option>";
                                  echo"<option value=\"CO\">Colorado</option>";
                                  echo"<option value=\"CT\">Connecticut</option>";
                                  echo"<option value=\"DE\">Delaware</option>";
                                  echo"<option value=\"DC\">District Of Columbia</option>";
                                  echo"<option value=\"FL\">Florida</option>";
                                  echo"<option value=\"GA\">Georgia</option>";
                                  echo"<option value=\"HI\">Hawaii</option>";
                                  echo"<option value=\"ID\">Idaho</option>";
                                  echo"<option value=\"IL\">Illinois</option>";
                                  echo"<option value=\"IN\">Indiana</option>";
                                  echo"<option value=\"IA\">Iowa</option>";
                                  echo"<option value=\"KS\">Kansas</option>";
                                  echo"<option value=\"KY\">Kentucky</option>";
                                  echo"<option value=\"LA\">Louisiana</option>";
                                  echo"<option value=\"ME\">Maine</option>";
                                  echo"<option value=\"MD\">Maryland</option>";
                                  echo"<option value=\"MA\">Massachusetts</option>";
                                  echo"<option value=\"MI\">Michigan</option>";
                                  echo"<option value=\"MN\">Minnesota</option>";
                                  echo"<option value=\"MS\">Mississippi</option>";
                                  echo"<option value=\"MO\">Missouri</option>";
                                  echo"<option value=\"MT\">Montana</option>";
                                  echo"<option value=\"NE\">Nebraska</option>";
                                  echo"<option value=\"NV\">Nevada</option>";
                                  echo"<option value=\"NH\">New Hampshire</option>";
                                  echo"<option value=\"NJ\">New Jersey</option>";
                                  echo"<option value=\"NM\">New Mexico</option>";
                                  echo"<option value=\"NY\">New York</option>";
                                  echo"<option value=\"NC\">North Carolina</option>";
                                  echo"<option value=\"ND\">North Dakota</option>";
                                  echo"<option value=\"OH\">Ohio</option>";
                                  echo"<option value=\"OK\">Oklahoma</option>";
                                  echo"<option value=\"OR\">Oregon</option>";
                                  echo"<option value=\"PA\">Pennsylvania</option>";
                                  echo"<option value=\"RI\">Rhode Island</option>";
                                  echo"<option value=\"SC\">South Carolina</option>";
                                  echo"<option value=\"SD\">South Dakota</option>";
                                  echo"<option value=\"TN\">Tennessee</option>";
                                  echo"<option value=\"TX\">Texas</option>";
                                  echo"<option value=\"UT\">Utah</option>";
                                  echo"<option value=\"VT\">Vermont</option>";
                                  echo"<option value=\"VA\">Virginia</option>";
                                  echo"<option value=\"WA\">Washington</option>";
                                  echo"<option value=\"WV\">West Virginia</option>";
                                  echo"<option value=\"WI\">Wisconsin</option>";
                                  echo"<option value=\"WY\">Wyoming</option>";
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
                <h2>Create Post</h2>

                <form action="newPetPost.php" enctype="multipart/form-data" method="POST">
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