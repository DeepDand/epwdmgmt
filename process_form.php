<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="http://library.marist.edu/images/jac-m.png"/>
    <link rel="shortcut icon" href="http://library.marist.edu/images/jac.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    -->
    <!--   <script
           src="https://code.jquery.com/jquery-3.2.1.js"
           integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
           crossorigin="anonymous"></script>-->

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type="text/javascript" src="http://library.marist.edu/js/libraryMenu.js"></script>
    <script type="text/javascript" src="http://library.marist.edu/js/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Bootstrap core CSS -->
    <link href="http://library.marist.edu/css/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://library.marist.edu/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="http://library.marist.edu/css/library.css" rel="stylesheet">
    <link href="http://library.marist.edu/css/menuStyle.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="headerContainer">
    <a href="http://library.marist.edu/" target="_self"> <div id="header"></div> </a>
</div>
<a class="menu-link" href="#menu"><img src="http://library.marist.edu/images/r-menu.png" style="width: 20px; margin-top: 4px;" /></a>
<div id="menu">
    <div id="menuItems">
    </div>
</div>
<div id="miniMenu" style="width: 100%;border: 1px solid black; border-bottom: none;">

</div>
<br /><br />
<div id="main-container" class="container">
    <div class="jumbotron">
        <div class="container fluid">
            <?php
            //$myFile = '../genauth.txt';
            $myFile = 'testfile.txt';
            $lines = file($myFile);//file in to an array
            // list($emailid,$epass) = preg_split("/,/",$lines[0],2);
            $epass = $lines[0];
            echo $epass."<br />";
            $epass = trim($epass);
            echo $epass."<br />";
            $oldlibpass = $epass;
            $epass = substr($epass,6,-6);
            echo $epass."<br />";
            $epass = str_replace("2b0dpm","",$epass);
            echo $epass."<br />";
            $epass = str_replace("EeL95Y","",$epass);
            echo $epass."<br />";
            $epass = str_replace("08","",$epass);
            echo $epass."<br />";
            $epass = strrev($epass);
            echo $epass."<br />";
            $libpass = $epass;

            // list($emailid,$epass) = preg_split("/,/",$lines[1],2);
            $epass = $lines[1];
            $epass = trim($epass);
            //echo $epass."<br />";
            $oldlibpass = $epass;
            $epass = substr($epass,6,-6);
            //echo $epass."<br />";
            $epass = str_replace("2b0dpm","",$epass);
            //echo $epass."<br />";
            $epass = str_replace("EeL95Y","",$epass);
            //echo $epass."<br />";
            $epass = str_replace("08","",$epass);
            //echo $epass."<br />";
            $epass = strrev($epass);
            $arcpass = $epass;

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            // reads an array of lines
            function replace_a_line($data) {
                $myFile = 'testfile.txt';
                $lines = file($myFile);
                $epass = $lines[0];
                $epass = trim($epass);
                $oldlibpass = $epass;
                if (stristr($data, $oldlibpass)) {
                    $newone ="mpd0b2" . strrev($_POST['newone']) . "Y59LeE\r\n";
                    //$newone = "mpd0b2" . $_POST['newone'] . "Y59LeE\r\n";
                    return $newone;
                }
                return $data;
            }

            function change_arc_pass($data){
                $myFile = 'testfile.txt';
                $lines = file($myFile);
                $epass = $lines[1];
                $epass = trim($epass);
                $oldarcpass = $epass;
                if (stristr($data, $oldarcpass)) {
                    $newone ="mpd0b2" . strrev($_POST['newone']) . "Y59LeE\r\n";
                    //$newone = "mpd0b2" . $_POST['newone'] . "Y59LeE\r\n";
                    return $newone;
                }
                return $data;
            }



            if((isset($_POST['oldone'])) && (isset($_POST['newone']))){
                $op = $_POST['oldone'];
                $np = $_POST['newone'];
                $choice = $_POST['libarc'];
                if($choice == 1){
                    // echo $libpass."<br />";
                    // echo $op;
                    if($libpass == $op){
                        $data = file('testfile.txt');
                        $data = array_map('replace_a_line',$data);
                        file_put_contents('testfile.txt', implode('', $data));
                        echo "The password has been updated successfully.";
                    } else {
                        echo "Please re-enter old password again.<a href=". 'process.php'. ">Click Here to try again.</a><br />";
                    }
                } else {
                    echo $arcpass;
                    echo $op;
                    if($arcpass == $op){

                        $data = file('testfile.txt');
                        $data = array_map('change_arc_pass',$data);
                        file_put_contents('testfile.txt', implode('', $data));
                        echo "The password has been updated successfully.";
                    } else {
                        echo "Please re-enter old password again.<a href=". 'process.php'. ">Click Here to try again.</a><br />";
                    }
                }
            }


            ?>
        </div>
    </div>
</div>
<div  class="bottom_container">
    <p class = "foot">
        James A. Cannavino Library, 3399 North Road, Poughkeepsie, NY 12601; 845.575.3106
        <br />
        &#169; Copyright 2007-2018 Marist College. All Rights Reserved.

        <a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> | <a href="http://library.marist.edu/repository/?c=repository&m=ack">Acknowledgements</a>
    </p>

</div>

</body>
</html>
