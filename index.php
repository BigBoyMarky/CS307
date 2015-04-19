<?php
    require_once "inc/global.inc.php";
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
                </div>
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
                <li id="slide1">
                    <img src="images/dogs/1.jpg" />
                    <div class="description">
                        <h2>KKSDLAFJKSADLJFKFSADFLALSJKL KALSDFJKSDLFJSDFJSLKFJSLKFJAKSDL ASDFKLAJIAOWEFMNNARKWELFN AFJSADLKFJAMNI AWEFKLJLKSADJFAISDOFMNAKSLDF</h2>
                    </div>
                </li>
                <li id="slide2">
                    <img src="images/dogs/2.jpg" />
                    <div class="description">
                       <h2>KKSDLAFJKSADLJFKFSADFLALSJKL KALSDFJKSDLFJSDFJSLKFJSLKFJAKSDL ASDFKLAJIAOWEFMNNARKWELFN AFJSADLKFJAMNI AWEFKLJLKSADJFAISDOFMNAKSLDF</h2>
                    </div>
                </li>
                <li id="slide3">
                    <img src="images/dogs/3.jpg" />
                    <div class="description">
                        <h2>KKSDLAFJKSADLJFKFSADFLALSJKL KALSDFJKSDLFJSDFJSLKFJSLKFJAKSDL ASDFKLAJIAOWEFMNNARKWELFN AFJSADLKFJAMNI AWEFKLJLKSADJFAISDOFMNAKSLDF</h2>
                    </div>
                </li>
                <li id="slide4">
                    <img src="images/dogs/4.jpg" />
                    <div class="description">
                        <h2>KKSDLAFJKSADLJFKFSADFLALSJKL KALSDFJKSDLFJSDFJSLKFJSLKFJAKSDL ASDFKLAJIAOWEFMNNARKWELFN AFJSADLKFJAMNI AWEFKLJLKSADJFAISDOFMNAKSLDF</h2>
                    </div>
                </li>
                <li id="slide5">
                    <img src="images/dogs/5.jpg" />
                    <div class="description">
                        <h2>KKSDLAFJKSADLJFKFSADFLALSJKL KALSDFJKSDLFJSDFJSLKFJSLKFJAKSDL ASDFKLAJIAOWEFMNNARKWELFN AFJSADLKFJAMNI AWEFKLJLKSADJFAISDOFMNAKSLDF</h2>
                    </div>
                </li>
            </ul>
        </div>
    </div>






                    <br><br>
                    <center>
                        <h3>Welcome to Mippsy!</h3>
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
