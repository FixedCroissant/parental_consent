<?php
//Continue the session
session_start();

/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/27/2015
 * Time: 1:18 PM
 */

//Variables are:
//Get values from PAGE 3

//Variables
//agree to let the student sign the housing agreement
//Handle undefined index issue if the end-user tries to submit without having the "I accept the housing agreement"


if(isset($_POST['agree_to_allow_student_to_agree_housing_agreement'])){
    $agreeToAllowStudent=$_POST['agree_to_allow_student_to_agree_housing_agreement'];
}
else{
    $agreeToAllowStudent="NoAgree";
}

$nameOFParent_Page3=$_POST["parent_authorization_to_allow_student_to_agree"];

$test = strlen(trim($_POST["parent_authorization_to_allow_student_to_agree"]));


//Get Session values from Page2.


/**
 * CHECK FOR EMPTY VALUES AND NOT STRICTLY RELY ON JAVASCRIPT VALIDATION.
 */
$errors = array();

//Check that the person has agreed to let their son/daughter sign an housing agreement.
if(empty($agreeToAllowStudent)){
    $errors[]=1;
}


//Check name of parent text and make sure that it is properly filled out.
//It will check to see if the name of the parent is filled out and if it is not and completely empty will add to our error list.
//If someone decides to put a space instead and just a string of spaces, it will not allow the person to submit.
//The only way to not add an error to the error list array is by having no spaces at the front of the name.
if(empty($nameOFParent_Page3) || strlen(trim($_POST["parent_authorization_to_allow_student_to_agree"]))===0)
{
    //Add to the error array.
    $errors[]=2;
}
elseif(preg_match('#[^a-z]+$#i', $nameOFParent_Page3)){
    //The name has numbers or symbols.
    $errors[]=3;
}





?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="A form that allows parents to sign consent for their child.">
        <meta name="author" content="JWilliams">
        <link rel="icon" href="images/favicon.ico">
        <title>University Housing - Parental Concent</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">
        <!--CSS for date picker-->
        <link href="css/datepicker.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="scripts/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="scripts/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--jQuery hosted by Google-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Date picker for Bootstrap-->
        <script src="scripts/bootstrap-datepicker.js"></script>
    </head>

    <body>
    <div class="header">
        <!--Add NC State Header-->
        <img class="heading_wrap" src="images/logo.png" alt="NC State University Housing">
        <div class="container">

            <?php

            /*
            echo "Did the person agree to the housing agreement?" . $agreeToAllowStudent;
            echo "<br/>";
            echo "the name of the parent agreeing to the allow the student is".$nameOFParent_Page3;
            echo "<br/>";
            echo "<br/>";
            */

            //NOTIFY THE END USER OF ANY BLANKS.
            //IF THE ERROR ARRAY IS NOT EMPTY ADD THE BODY OF THE UNORDERED LIST.

            if (!empty($errors)){
            echo "<div class='errors rounded_corners'>";

                echo "<p>";
                    echo "<h5>ERROR SUBMITTING...</h5>";
                echo "<ul>";
                    if(in_array(1,$errors)){
                    echo "<li>";
                        echo "It doesn't appear that you agreed to the housing agreement.";
                        echo "</li>";
                    }
                    if(in_array(2,$errors)){
                    echo "<li>";
                        echo "It appears that we are missing the parent's name";
                        echo "</li>";
                    }
                    if(in_array(3,$errors)){
                        echo "<li>";
                        echo "The parents name must not contain any symbols or numbers.";
                        echo "</li>";
                    }

                    echo "<br/>";
                    echo "<br/>";
                    //Display a link to the end-user to go back
                    echo "Please go ". "<a href='page3.php'>back</a>"                    ." and double check your entries.";

                    echo "</p>";
                    echo "</div>";
            } //Close of the non-empty error list.


            /*
            * IF THE ERROR ARRAY IS EMPTY, PROCEED TO THE THANK YOU PA
            */
            if (empty($errors)){


                echo $test;




            echo "<br/>";
            echo "All is well, you can pass through.";
                echo "<br/>";
                echo "<br/>";

            echo "<div class='thank_you_header'>";
            echo "Thank You for Your Submission.";
            echo "</div>";

                echo "<br/>";

                //Show values that were submitted on page 1
                echo "These values came from page 1";
                echo "<br/>";
                echo "This is the parental e-mail address: "."<strong>".$_SESSION['parental_email_address']."</strong>";
                echo "<br/>";
                echo "This is the resident's date of birth according to the parent " ."<strong>". $_SESSION['student_date_of_birth']."</strong>";
                echo "<br/>";
                echo "This is the date that the parent indicated that the housing agreement was signed "."<strong>".$_SESSION['student_date_of_housing_application']."</strong>";

                //Information from page 3, the "I agree checkbox indicator" and the persons name
                echo "<br/>";
                echo "<br/>";
                echo "Did the person check the checkbox?"."<strong>".$agreeToAllowStudent."</strong>";
                echo "<br/>";
                echo "What was the parents name on page 3?"." "."<strong>".$nameOFParent_Page3."</strong>";

            echo "<br/>";
            echo "<br/>";
            }

            /*
            * RECEIVE AND CONFIRM THE IDENTITY VIA LOOK-UP IN ORACLE.
            */

            //PROVIDE HTML MARK UP BELOW.
            ?>

            <!--Line Break(s) x4-->
            <br/>
            <br/>
            <br/>
            <br/>

            <!--Close Window-->
            <a class="btn btn-lg wolfpackred btn-block smaller" onclick="" alt="Close Windows -- Does not Work on Chrome">Close Window</a>





        </div> <!-- /container -->
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="scripts/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>