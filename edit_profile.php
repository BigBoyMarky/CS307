<?php
/**
 * Author: aaron and kaijun
 * Date: 3/5/2015
 * Time: 3:21 PM
 */
require_once "inc/global.inc.php";
if (!isset($_SESSION['logged_in']))  {
    header("Location: index.php");
}

$user = unserialize($_SESSION['user']);
$data = $user->get_all();
$target_dir = "uploads/usr/";

$uEmail = $user->email; //ex: "ho52"@purdue.edu
    $pathName = strstr($uEmail, '@', true); 
    $target_dir=$target_dir.$pathName; // target_dir is now uploads/usr/ho52

    if(!file_exists($target_dir)){
         mkdir($target_dir, 0777, true);  
    }
   
    $target_dir=$target_dir."/";

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];


   
    $validextensions = array(".jpeg", ".jpg", ".png");
    
     $file_extension = strstr( $_FILES["picture"]["name"], "."); 
  
    if ((($_FILES["picture"]["type"] == "image/png") || ($_FILES["picture"]["type"] == "image/jpg") || ($_FILES["picture"]["type"] == "image/jpeg")
) && ($_FILES["picture"]["size"] < 2000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)){
         //there is profile before, delete it
        if (file_exists($target_dir."profile.png")){
        unlink($target_dir."/profile.png");
          } 

         if(file_exists($target_dir."profile.jpg")){
            unlink($target_dir."/profile.jpg");
          }
      if(file_exists($target_dir."profile.jpeg")) {  
      
         unlink($target_dir."/profile.jpeg");
             }
             
  $target_file= $target_dir. $_FILES["picture"]["name"];

    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        //change name to profile.*;


    
    
    $path=pathinfo($target_file,PATHINFO_DIRNAME );

    
    $newpath = $path."/profile".$file_extension;
    echo $newpath;
    rename ($target_file, $newpath);

    
    } 
    
    $data['fname'] = $fname;
    $data['lname'] = $lname;
    $data['age'] = $age;
    $data['gender'] = $gender;
    $data['contactNumber'] = $contactNumber;
    $usrclass = new User($data);
    $usrclass->save();
     header("Location: account.php");
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
        <script>
    $(function () {
        $(":file").change(function () {
           if (this.files && this.files[0]) {
              var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};
    </script>
    
    
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
            <h2>Edit Profile Information</h2>
             
                      <?php   // if uploads/usr/profile exist, show uploads/usr/profile in this page, if not, show de fault pic  images/dpp.png
      
       
     if(!file_exists($target_dir)){ // if folder not exist
           mkdir($target_dir);  
         //show de fault pic  images/dpp.png
         echo '<img id="myImg" src = "images/dpp.png" width="300" height="300"> ';
     }else {
    
    if (file_exists($target_dir."profile.png")){
      $target_dir .= "profile.png";

                                   
                               
                                  
     
            echo '<img id="myImg" src ='. $target_dir.'> ';
   
        } 
       else if (file_exists($target_dir."profile.jpg")){
          
                   $target_dir .= "profile.jpg";

            echo '<img id="myImg" src ='. $target_dir.'> ';
           
    }
         else if (file_exists($target_dir."profile.jpeg")){        
           $target_dir .= "profile.jpeg";
           echo '<img id="myImg" src ='. $target_dir.'width="300" height="300"> ';
        }
       else{
   
         echo '<img id="myImg" src = "images/dpp.png" width="300" height="300"> ';
 }
  } 
              ?>  
             
            <br>
            <form enctype="multipart/form-data" action="edit_profile.php" method="POST">
                    <input type='file' name='picture'>
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
