<?php

/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/27/2015
 * Time: 10:04 AM
 */
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

<script>
    //When the document is ready ...
    $(document).ready( function () {
        //Date of Birth for the Student/Resident
        $('#date_of_birth').datepicker({
            format: "mm/dd/yyyy"
        });
        //Student or Resident Date of Housing Application
        $('#dateOfHousingApplication_icon').datepicker({
            format: "mm/dd/yyyy"
        });
    });
</script>

<div class="header">
    <!--Add NC State Header-->
    <img class="img-responsive" src="images/logo.png" alt="NC State University Housing">
<div class="container center_div">
    <!--TO DO ADD FORM SUBMISSION TO CHECK DATA PROVIDED BY THE PARENT-->
    <form class="form-signin" action="page2.php" method="POST">
        <h2 class="form-signin-heading">Please provide the following information:</h2>
        <ul>
            <li>
                Parental E-Mail Address
            </li>
            <li>
                Resident Date of Birth
            </li>
            <li>
                Date of Resident Application
            </li>
        </ul>
        <div class="row">
        <div class="span9 columns">
            <div class="input-group">
                <div class="well-sm">
                    <label for="inputEmail">Parental E-Mail</label>
                    <div class="input" id="inputEmail">
                        <input class="span2" size="50" type="text" placeholder="Parental EMail Address (e.g. wolf@ncsu.edu)" name="parental_email"required autofocus="">
                    </div>
                </div>
            </div>

                <div class="input-group">
                    <div class="well-sm">
                        <label for="date_of_birth">Student Date of Birth</label>
                        <div class="input-append date" id="date_of_birth" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <input class="span2" name="student_date_of_birth" size="25" type="text" value="MM-DD-YYYY" readonly>
                            <span class="add-on"><i class="glyphicon  glyphicon-calendar"></i></span>
                        </div>
                    </div>


                        <div class="well-sm">
                            <label for="dateOfHousingApplication_icon">Application of Housing Agreement</label>
                            <div class="input-append date" id="dateOfHousingApplication_icon" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                <input class="span2" size="25" type="text" name="date_of_housing_application" value="MM-DD-YYYY" readonly >
                                <span class="add-on"><i class="glyphicon  glyphicon-calendar"></i></span>
                            </div>

                        </div>
                    </div> <!--./Close input group-->

        </div>  <!--./close span9 columns-->


        </div> <!--./close the div class row-->



        <button class="btn btn-lg wolfpackred btn-block spacing" type="submit">Continue Page 2</button>
    </form>

</div> <!-- /container -->
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="scripts/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
