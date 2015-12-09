/**
 * Name:
 * Date:
 * Description:
 * Ver: 1.0
 */


$( document ).ready(function() {

    $('form').on('submit', function (e) {
        e.preventDefault();

        //Use the function created below.
        checkData();
    });

});







function checkData() {
           //static values
            //var email = "papajohnson@hotmail.com";

            //var studentTERM = "2158";
            //var housing_application_process_date = "02/09/2016";
            //var student_dob="03/07/1994";
        //End static values.

        //Dynamic values from the index.php page
        var email = $("#parental_email").val();
        var studentTERM = $("#term_of_housing_application").val();
        var housing_application_process_date=$("#date_of_housing_application").val();
        var student_dob = $("#student_date_of_birth").val();

        //End dynamic values from the index.php page.



        $.post( "test_connection_and_class.php", {
            parentalEMAIL: email,
            student_date_of_birth: student_dob,
            date_of_housing_application:housing_application_process_date,
            term_of_housing_application: studentTERM
        })

            //After loading information, do the following...
            .done(function( data ) {

                //Using BOOLEAN setMATCH() from the queryPull.php page.
                //1 = True, if it's not 1, then we could assume that it's going to be false.
                if(data!=1){
                    //For testing and debugging purposes only...
                    //alert('Nothing has returned!');



                    //First remove the plain "#" that is set up by default.
                    $("#submissionFORM").removeAttr("action");



                    //Clear any error message that might currently be there.
                    $("#errors").html();


                    //Let people know of what they put in the system and notify
                    //that there are NO results found.

                    $("#errors").addClass("error").html('We do not find any resident with the information you have provided');
                    $("#errors").append("<br/>");
                    $("#errors").append("You have provided the following:");
                    $("#errors").append("<br/>");
                    $("#errors").append("Parental E-Mail Address: "+email);
                    $("#errors").append("<br/>");
                    $("#errors").append("Student Date of Birth: "+student_dob);
                    $("#errors").append("<br/>");
                    $("#errors").append("Date of Housing Application: "+housing_application_process_date);
                    $("#errors").append("<br/>");
                    $("#errors").append("Term of Housing Application: "+studentTERM);
                }
                //There is a match from the database lookup.
                else {


                    //NeW
                    //Go to page2.php with my post parameters.
                    //example....
                    //$().redirect('demo.php', {'arg1': 'value1', 'arg2': 'value2'});
                    $.redirect('page2.php', {'parental_email': 'email', 'student_date_of_birth': 'student_dob', 'date_of_housing_application': 'housing_application_process_date','retrieved_student_first_name': 'THIS IS THE TEST FIRST NAME','retrieved_student_last_name': 'THIS IS THE TEST LAST NAME!!!!'});
                    //END NEW




                    //TO DO TO DO TO DO Remove on submit
                   // $('form').on('submit', function (e) {


                        //Causing the form not to submit.
                        $('form').unbind('submit');

                                //If anything was displayed on the error message DIV, clear everything out.
                                $("#errors").addClass("removeerror").html('');


                                //Change the function of the form and the processing.
                                /*var newURL = "page2.php";

                                //First remove the plain "#" that is set up by default.
                                $("#submissionFORM").removeAttr("action");
                                //Go to the new page as there is a match in the system for the particular search.
                                $("#submissionFORM").attr("Action",newURL);*/

                                //Commented out 8:26am, 12-09-2015.
                                //alert("Data Loaded: " + data);
                    //});







                }
            }); /*end done submit data function ...*/

};     /*End CheckData function*/