<?php
require_once "inc/global.inc.php";
$ph= new PostsHandler();
$posts = $ph->fetchAllPosts();

?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id = "whole_wrapper">
    <div id = "content">
        <div id="wrapper">
            <div id="header">
                <?php
                $page = $_SERVER['PHP_SELF'];
                include "inc/menu.php";
                ?>
            </div>
            <div id="content">
                <!--<img id="homepic" src="images/banner.jpg">-->





                <div id="slideshow-wrap">
                    <input type="radio" id="button-1" name="controls" checked="checked"/>
                    <label for="button-1"></label>
                    <input type="radio" id="button-2" name="controls"/>
                    <label for="button-2"></label>
                    <input type="radio" id="button-3" name="controls"/>
                    <label for="button-3"></label>
                    <input type="radio" id="button-4" name="controls"/>
                    <label for="button-4"></label>
                    <input type="radio" id="button-5" name="controls"/>
                    <label for="button-5"></label>
                    <label for="button-1" class="arrows" id="arrow-1">></label>
                    <label for="button-2" class="arrows" id="arrow-2">></label>
                    <label for="button-3" class="arrows" id="arrow-3">></label>
                    <label for="button-4" class="arrows" id="arrow-4">></label>
                    <label for="button-5" class="arrows" id="arrow-5">></label>
                    <div id="slideshow-inner">
                        <ul>

                            <?php
                            $len=sizeof($posts);
                           $target_path = "uploads/posts/";

                            echo ' <li id="slide1">';
                            echo   '<img src="';
                            $id=$posts[$len-1]['id'];

                            $file_path= $target_path.$id;
                            $files1 = scandir($file_path);
                            $size= count($files1);
                            for ($i=0; $i < $size ; $i++) {

                                if (!strcmp($files1[$i], ".") || !strcmp($files1[$i], "..")) {
                                    continue;
                                }else {
                                    $img_path=$file_path."/".$files1[$i];
                                    break;
                                }
                            }
                            echo     $img_path.'" />';

                            echo '   <div class="description">';
                            echo '<h2>';
                            echo  "Name:    ".$posts[$len-1]['fname']."  ".$posts[$len-1]['lname']." <br>location:  ".$posts[$len-1]['location']."   <br>age: ".$posts[$len-1]['age'];
                            echo '</h2>';
                            echo '<br>';
                            echo ' </div>';
                            echo '</li>';


                            echo ' <li id="slide2">';
                            echo   '<img src="';
                             $id=$posts[$len-2]['id'];

                            $file_path= $target_path.$id;
                            $files1 = scandir($file_path);
                            $size= count($files1);
                            for ($i=0; $i < $size ; $i++) {

                                if (!strcmp($files1[$i], ".") || !strcmp($files1[$i], "..")) {
                                    continue;
                                }else {
                                    $img_path=$file_path."/".$files1[$i];
                                    break;
                                }
                            }
                            echo     $img_path.'" />';

                            echo '   <div class="description">';
                            echo '<h2>';
                            echo  "Name:    ".$posts[$len-2]['fname']."  ".$posts[$len-2]['lname']." <br>location:  ".$posts[$len-2]['location']."   <br>age: ".$posts[$len-2]['age'];
                            echo '</h2>';
                            echo ' </div>';
                            echo '</li>';


                            echo ' <li id="slide3">';
                            echo   '<img src="';
                            $id=$posts[$len-3]['id'];
                             $file_path= $target_path.$id;
                            $files1 = scandir($file_path);
                            $size= count($files1);
                            for ($i=0; $i < $size ; $i++) {

                                if (!strcmp($files1[$i], ".") || !strcmp($files1[$i], "..")) {
                                    continue;
                                }else {
                                    $img_path=$file_path."/".$files1[$i];
                                    break;
                                }
                            }
                            echo     $img_path.'" />';
                            echo '   <div class="description">';
                            echo '<h2>';
                            echo  "Name:    ".$posts[$len-3]['fname']."  ".$posts[$len-3]['lname']." <br>location:  ".$posts[$len-3]['location']."   <br>age: ".$posts[$len-3]['age'];
                            echo '</h2>';
                            echo ' </div>';
                            echo '</li>';



                            echo ' <li id="slide4">';
                            echo   '<img src="';
                            $id=$posts[$len-4]['id'];
                             $file_path= $target_path.$id;
                            $files1 = scandir($file_path);
                            $size= count($files1);
                            for ($i=0; $i < $size ; $i++) {

                                if (!strcmp($files1[$i], ".") || !strcmp($files1[$i], "..")) {
                                    continue;
                                }else {
                                    $img_path=$file_path."/".$files1[$i];
                                    break;
                                }
                            }
                            echo     $img_path.'" />';
                            echo '   <div class="description">';
                            echo '<h2>';
                            echo  "Name:    ".$posts[$len-4]['fname']."  ".$posts[$len-4]['lname']." <br>location:  ".$posts[$len-4]['location']."   <br>age: ".$posts[$len-4]['age'];
                            echo '</h2>';
                            echo ' </div>';
                            echo '</li>';





                            echo ' <li id="slide5">';
                            echo   '<img src="';
                            $id=$posts[$len-5]['id'];
                             $file_path= $target_path.$id;
                            $files1 = scandir($file_path);
                            $size= count($files1);
                            for ($i=0; $i < $size ; $i++) {

                                if (!strcmp($files1[$i], ".") || !strcmp($files1[$i], "..")) {
                                    continue;
                                }else {
                                    $img_path=$file_path."/".$files1[$i];
                                    break;
                                }
                            }
                            echo     $img_path.'" />';

                            echo '   <div class="description">';
                            echo '<h2>';
                            echo  "Name:    ".$posts[$len-5]['fname']."  ".$posts[$len-5]['lname']." <br>location:  ".$posts[$len-5]['location']."   <br>age: ".$posts[$len-5]['age'];
                            echo '</h2>';
                            echo ' </div>';
                            echo '</li>';


                            ?> </ul>
                    </div>
                </div>






                <br><br>
                <center>
                    <h3>Welcome to Mippsy!</h3>
                    <h4>We are an alert system, dedicated to reuniting people with their lost ones, be it person or pet.</h4>
                    <h4>Mippsy is a non-profit organization, with only what's best for the community in mind.</h4>



                    <br>
                </center>
                <br><br><br>
            </div>
            <div id="footer">
                <?php include "inc/footer.php"; ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>