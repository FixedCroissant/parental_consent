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
        <form method="post" action ="page4.php" >
            <h4>THIS IS THE HTML FORMAT OF THE Housing AGREEMENT</h4>
            <br/>
            <br/>
            <div id = "housing_agreement">
                <div id="housing_agreement_inner">
                    <img src="images/adobe_PDF_file_icon_32x32.png"/><a href="#" onclick="alert('Export to PDF')">Export to PDF</a>
                    <p>
                        <h3>I. Agreement</h3>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                        In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                        <br/>
                        <h3>II. Pricing</h3>
                        Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
                        <br/>
                        <h3>III. Termination of Agreement</h3>
                        Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut
                    <br>
                    <br>
                    <br/>




                <span style="font-size:xx-small;">REV: 2015-11-15</span>

                    </p>
                    </div>
            </div><!--End Housing Agreement portion of the page-->

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agree_to_allow_student_to_agree_housing_agreement" class="center_agree" value="agree"  required autofocus> I accept the housing agreement above.
                </label>
            </div>
            <div class="parent_name">
                    <label for ="parental_agreement_name_of_parent">Name of Parent:</label>
                    <input type="text" class="form-control"  name="parent_authorization_to_allow_student_to_agree" size="50"  />

            </div>


                <br/>
                <br/>
                <button class="btn btn-lg wolfpackred btn-block smaller" type="submit">Submit Authorization</button>
        </form>




















        </div> <!-- /container -->
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="scripts/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
