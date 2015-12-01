<?php
//Session Start
session_start();

/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/27/2015
 * Time: 1:18 PM
 */

//Variables are:
//Parental E-Mail

$parental_email_address = $_POST["parental_email"];
$student_date_of_birth = $_POST["student_date_of_birth"];
$student_date_of_housing_application=$_POST["date_of_housing_application"];


//Set as Session Values
$_SESSION['parental_email_address']=$parental_email_address;
$_SESSION['student_date_of_birth']=$student_date_of_birth;
$_SESSION['student_date_of_housing_application']=$student_date_of_housing_application;





/**
 * CHECK FOR EMPTY VALUES AND NOT STRICTLY RELY ON JAVASCRIPT VALIDATION.
 */
$errors = array();

//Check Parental E-Mail
if(empty($parental_email_address)){
    $errors[]=1;
}

//Check student's date of birth to make sure that it is properly filled out.
if(empty($student_date_of_birth)){
    $errors[]=2;
}
//Lastly, check the student's housing application and make sure it's filled out.
if (empty($student_date_of_housing_application))
{
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
        <img class="img-responsive" src="images/logo.png" alt="NC State University Housing">
        <div class="container">

            <?php
            //NOTIFY THE END USER OF ANY BLANKS.
            //IF THE ERROR ARRAY IS NOT EMPTY ADD THE BODY OF THE UNORDERED LIST.

            if (!empty($errors)){
                echo "<div class='errors rounded_corners'>";

                echo "<p>";
                echo "<h5>ERROR SUBMITTING...</h5>";
                echo "<ul>";
                    if(in_array(1,$errors)){
                        echo "<li>";
                        echo "We are missing the parental e-mail address.";
                        echo "</li>";
                }
                if(in_array(2,$errors)){
                        echo "<li>";
                        echo "We are missing the student's date of birth";
                        echo "</li>";
                }
                if (in_array(3,$errors)){

                        echo "<li>";
                        echo "We are missing the date that the student applied for housing.";
                        echo "</li>";
                }
                echo "<br/>";
                echo "<br/>";
                //Display a link to the end-user to go back
                echo "Please go ". "<a href='index.php'>back</a>"                    ." and double check your entries.";

            echo "</p>";
            echo "</div>";
            } //Close of the non-empty error list.


            /*
             * IF THE ERROR ARRAY IS EMPTY, PROCEED TO THE NEXT PAGE -- PAGE 3
             */
            if (empty($errors)){
                echo "<br/>";
                //Comment out 11-24-2015....
                //echo "All is well, you can pass through.";

                /*
                 * RECEIVE AND CONFIRM THE IDENTITY VIA LOOK-UP IN ORACLE.
                 */


                //PROVIDE HTML MARK UP BELOW.
            ?>

            <br/>
            <br/>
                <!--Message to the parent-->
             <p>
                 Hello Parent/Guardian of <STRONG>STUDENT FIRST NAME, STUDENT LAST NAME</STRONG><br/>
                <br/>
                    Welcome to University Housing! We're glad your student has decided to live on campus with us at NC State University. Before we will assign your student to campus housing, we need you to confirm that your student has your permission to sign the housing agreement. You are receiving this notice because your student will not be 18 years of age at move in.
                <br/>
                <br/>
                    If you intend for your student to live on campus, please click “proceed” to continue and accept the terms of the agreement by completing the parental waiver. Please know that your student will not receive an assignment if the waiver is not completed.
                <br/><br/>
                    If you do not intend for your student to live on campus, please click <strong>“decline request”</strong> on the next page.
                <br/><br/>
                    To view a copy of the housing agreement, please click <a href="#" style="font-weight:bold;">here</a>.
                <br/><br/>
                <span style="font-weight:bold; font-size:x-large;">Frequently asked questions:</span> <br/><br/>
                    <span style="font-weight:bold;">Is the agreement for a semester or for the academic year?</span>
                    <ul>
                        <li>The housing agreement is an academic year agreement, covering both the fall and spring terms.</li>
                    </ul>
                    <span style="font-weight:bold;">Is there an application fee?</span>
                    <ul>
                        <li>No, NC State does not charge an application fee. However, students who complete an application are requesting to be assigned and will be assigned.</li>
                    </ul>
                     <span style="font-weight:bold;">May my student decline the housing assignment?</span>
                    <ul>
                        <li>Students completing a housing application are requesting on campus housing and will be assigned.  Students may choose to cancel their housing, but students may not decline the assignment. For additional information regarding cancellations, please refer to our <a href="https://housing.dasa.ncsu.edu/costs-agreements/" style="font-weight:bold;">cancellation page.</a></li>
                    </ul>
                    <span style="font-weight:bold;">Is there a guarantee that my student will receive their building preference or preferred roommate?</span>
                    <ul>
                        <li>Unfortunately University Housing cannot guarantee that a student will receive their preferred building or preferred roommate. However, University Housing does make every effort to meet a student’s request.</li>

                        <br/>
                         <span style="font-weight:bold;">We do encourage students to:</span>
                         <br/>

                        <ul>
                                <li>
                                    Apply Early
                                </li>
                                <li>
                                    Students who are requesting each other as mutual roommates should apply within 30 days of each other and request the same buildings.
                                </li>
                                <li>
                                    Submit a complete application. The application is NOT complete until a confirmation number is provided.
                                </li>
                        </ul>
                    </ul>
                    <span style="font-weight:bold;">Should my student participate in a village?</span>
                    <p>Yes! Years of research and data shows that students who participate in a village have a higher GPA, graduate sooner, feel more connected to the University <br/>
                    and have an overall higher satisfaction with their experience. Our villages are designed to provide our students with additional academic resources and activities <br/>
                    outside of the classroom including but not limited to: social activities, cultural trips, recreational excursions, and a close knit community.</p>

                </p>



                <!--<button class="btn btn-lg wolfpackred btn-block smaller" type="submit"> </button>-->

                    <a id='continue_page3Button' href="page3.php" class="btn btn-lg wolfpackred btn-block smaller" alt="Continue to Next Page">Continue</a>












            <?php
              //Close the above IF statement.
            }
            ?>








        </div> <!-- /container -->
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="scripts/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
