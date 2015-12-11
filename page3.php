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
//Get values from PAGE 2



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

        <title>University Housing - Parental Consent</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">
        <!--CSS for date picker-->
        <link href="css/datepicker.css" rel="stylesheet">
        <!--CSS Needed for the prompts-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
        <!--Import of jQuery UI-->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!--Confirmation message that the person wants to decline-->
        <!--Uses jQuery UI-->
        <script src="scripts/confirmationOfDecline.js"></script>
    </head>

    <body>



    <div class="header">
        <!--Add NC State Header-->
        <img class="img-responsive" src="images/logo.png" alt="NC State University Housing">
        <div class="container">
        <form method="post" action ="page4.php" >
            <div id = "housing_agreement">
                <div id="housing_agreement_inner">
                    <div id="container">
                        <div id ="header">
                            <h3 style="text-align: center">University Housing</h3>
                            <h5 style="text-align: center; text-decoration:underline;">Under 18 Years of Age Parental Approval Form</h5>
                        </div>
                        <div id="content">
                            The signature below certifies that I have read and fully understand the University Housing Agreement and agree to abide by the conditions and terms published separately and made part of the Agreement
                            by reference.

                            <br/>
                            <br/>
                            Furthermore, I understand my failure to provide complete, accurate, and truthful information on the Housing Application will be grounds to deny or withdraw the Housing Application, or cancel the assignment.
                            <br/>
                            <br/>
                            If the student is not yet 18 years of age by the fist day of check-in for the requested term and year, a parent or guardian's signature is required to indicate acceptance of the conditions and terms of the
                            University Housing Agreement.
                            <br/>
                            <br/>
                        </div>
                        <!--Add pulled student information to the page-->
                        <div id="student_information">
                            <span style="text-decoration:underline;">STUDENT INFORMATION</span>
                            <br/>
                            Last Name: <span class="line" style="font-weight: bold;"><?php echo $_SESSION["RETRIEVED_STU_LAST_NAME"];                      ?></span><br/>
                            First Name: <span class="line" style="font-weight: bold;"><?php echo $_SESSION["RETRIEVED_STU_FIRST_NAME"];                    ?></span><br/>
                            Middle Name: <span class="line" style="font-weight: bold;"><?php echo $_SESSION['RETRIEVED_STU_MID_NAME'];                     ?></span><br/>
                            NC State ID Number: <span class="line" style="font-weight: bold;"><?php echo $_SESSION['RETRIEVED_STU_EMPLID'];                ?></span><br/>
                        </div>
                        <div id="housing_logo">

                        </div>
                    </div><!--*.--end of container-->
                </div><!--End housing agreement inner-->
            </div><!--End Housing Agreement portion of the page-->

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agree_to_allow_student_to_agree_housing_agreement" class="center_agree" value="agree"  required autofocus> I accept the housing agreement above.
                </label>
            </div>
            <div class="parent_name">
                    <label for ="parental_agreement_name_of_parent">Name of Parent:</label>
                    <input type="text" class="form-control"  name="parent_authorization_to_allow_student_to_agree" size="50"  required required-message="hello"/>

            </div>


                <br/>
                <br/>
            <div id="buttonContainer_Submit">
                <button id= "agreementSubmitted" class="btn btn-lg wolfpackred btn-block smaller" type="submit">Submit Authorization</button>
                <!--New Decline Button-->
                <!--Note: This button will send a message to all those that have decided against allowing their student to sign a lease.-->
                <button id ="agreementDECLINED" class="btn btn-lg wolfpackred btn-block smaller" type = "button">Decline Request</button>
            </div>

        </form>
        </div> <!-- /container -->
    </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="scripts/ie10-viewport-bug-workaround.js"></script>
    </body>
    <div id="agreementDECLINED_MESSAGE" title="Are You Sure?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 5px 0;"></span><span style="font-size:x-small;">You are declining the authorization of this housing agreement of your student. Are you sure?</span></p>
    </div>
</html>
