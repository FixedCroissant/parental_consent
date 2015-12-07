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
            <li>
                Term of Resident Application
            </li>
        </ul>
        <div class="row">
        <div class="span9 columns">
            <div class="input-group">
                <!--Input Number 001 - Parental EMail-->
                <div class="well-sm">
                    <label for="inputEmail">Parental E-Mail</label>
                    <div class="input" id="inputEmail">
                        <input class="span2" size="50" type="text" placeholder="Parental EMail Address (e.g. wolf@ncsu.edu)" name="parental_email"required autofocus="">
                    </div>
                </div>
            </div>
            <!--Input Number 002 - Student Date of Birth-->
                <div class="input-group">
                    <div class="well-sm">
                        <label for="date_of_birth">Student Date of Birth</label>
                        <div class="input-append date" id="date_of_birth" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <input class="span2" name="student_date_of_birth" size="25" type="text" value="MM-DD-YYYY" readonly required>
                            <span class="add-on"><i class="glyphicon  glyphicon-calendar"></i></span>
                        </div>
                    </div>

            <!--Input Number 002 - Application of Housing Agreement-->
                        <div class="well-sm">
                            <label for="dateOfHousingApplication_icon">Application of Housing Agreement</label>
                            <div class="input-append date" id="dateOfHousingApplication_icon" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                <input class="span2" size="25" type="text" name="date_of_housing_application" value="MM-DD-YYYY" readonly required>
                                <span class="add-on"><i class="glyphicon  glyphicon-calendar"></i></span>
                            </div>

                        </div>
            <!--Input Number 003 - Term of Housing Application-->
                    <div class="well-sm">
                        <label for="termOfHousingApplication_icon">Term of Housing Application</label>
                        <div class="input-append date" id="termOfHousingApplication_icon" required>


                            <!--Dropdown featuring terms-->
                                <select name="term_of_housing_application">
                                    <?php
                                    $long_YEAR = date("Y");          /*LONG YEAR*/
                                    $short_YEAR = date("y");     /*SHORT YEAR*/
                                    $new_YEAR = ($short_YEAR+1);
                                    //Maximum Term is 3 semesters out.
                                    $maxTERM = 2;

                                    $count=0;
                                    //Temporarily Comment out ....
                                    /*for($x=0;$x<$maxTERM;$x++) {
                                        if($count==0) {
                                            //Only for the Fall 2015 term.
                                            echo "<option value='2..8'>Fall $long_YEAR</option>";
                                            //Spring 2016
                                            $newYEAR=($long_YEAR+x+1);
                                            echo "<option value='28'>Spring $newYEAR</option>";
                                        }
                                        else if($count>0){
                                            $newYEAR=($long_YEAR+x+1);
                                                //Only for the Fall 2016 term.
                                                echo "<option value='2..8'>Fall $newYEAR</option>";
                                            $newYEAR=($long_YEAR+x+2);
                                                //Spring 2017
                                                echo "<option value='28'>Spring $newYEAR</option>";

                                        }

                                        $count++;
                                    }*/
                                    ?>
                                    <!--Below will need to be removed to have 3 new terms created based on the current date...-->
                                    <!--Temporary, need to make it automatic generate based on the date that this is presented...-->
                                    <option value='2158'>Fall 2015</option>
                                    <option value='2161'>Spring 2016</option>
                                    <option value='2168'>Fall 2016</option>

                                </select>
                                <!--End Drop-down featuring terms...-->


                        </div>
                    </div>
                        </div> <!--./Close input group-->
        </div>  <!--./close span9 columns-->
        </div> <!--./close the div class row-->
        <button class="btn btn-lg wolfpackred btn-block spacing" type="submit">Continue</button>
    </form>

</div> <!-- /container -->
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="scripts/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
