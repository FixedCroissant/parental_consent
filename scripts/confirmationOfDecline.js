/**
 * Author: J.Williams
 * Date: 12/01/2015
 * Description:
 */


$(function() {


    $('#agreementDECLINED').click(function() {
        $( "#agreementDECLINED_MESSAGE" ).dialog({
                    resizable: true,
                    height:250,
                    modal: false,
                    buttons: {
                            "Please Decline": function() {
                                    //Close the box....
                                    $( this ).dialog( "close" );
                                    //Go to new location
                                    //PRODUCTION
                                    //window.open('http://housing.ncsu.edu/apps/parental_consent/declineAuthorization.php', 'window name', 'window settings');


                                //DEVELOPMENT
                                    window.open('http://localhost/apps/development/parental_consent/declineAuthorization.php', 'window name', 'window settings');

                                    //Automatically move to the new page without touching the update function.
                                    //As an HTTP redirect (back button will not work )
                                    //Go to the Thank You page after the person lets us know they do not want to agree
                                    //to the student's authorization.

                                    //Production
                                    //window.location.replace("https://housing.ncsu.edu/apps/parental_consent/thankyou.html");

                                    //DEVELOPMENT/
                                    //window.location.replace("http://localhost/apps/development/parental_consent/thankyou.html");


                                    //SEND INFORMATION TO THE FORM SET UP IN FORM TOOLS.

                                //Dynamic values to put in the form tools form.
                                //var student_dob = $("#student_date_of_birth").val();

                                //Student ID
                                var student_ID_NUMBER = $("#student-id-number").text();
                                //Student Date of Birth (Hidden)
                                var studentDATE_OF_BIRTH= $("#studentDOB").val();
                                //Student First Name
                                var student_FIRST_NAME = $("#student-first-name").text();
                                //Student Last Name
                                var student_LAST_NAME = $("#student-last-name").text();

                                //Application Term  (Hidden)
                                var application_TERM =$("#student-application-term").val();
                                //Application Date of Completion (Hidden)
                                var application_DATE_OF_HOUSING_APPLICATION=$("#student-application-date-of-completion").val();
                                //Parental EMail (Hidden)
                                var parental_email_address =$("#parental-email").val();

                                //End dynamic values to put in the form tools.


                                $.post( "sendDecline.php", {
                                    studentEMPLID:student_ID_NUMBER,
                                    studentDOB:studentDATE_OF_BIRTH,
                                    studentfName:student_FIRST_NAME,
                                    studentlName:student_LAST_NAME,
                                    pEMailAddress:parental_email_address,
                                    applicationTerm:application_TERM,
                                    applicationDateOfCompletion:application_DATE_OF_HOUSING_APPLICATION
                                }

                                )

                            },
                                Cancel: function() {
                                $( this ).dialog( "close" );
                                }
                            }
                });




    });



});