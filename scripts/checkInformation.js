/**
 * Name:
 * Date:
 * Description:
 * Ver: 1.0
 */


$( document ).ready(function() {

    $('form').on('submit', function (e) {
        //Prevent the form from submitting through the use of the enter key.
        //Prevent the form from doing anything until the commands below are completed.
        e.preventDefault();

        //Utilize the function that was created below.
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


                alert(data);

                //Breakup the data returned.
                //First piece of text is firstName
                //Second piece of text is lastName
                //Third piece of text is how many matches are available.

                //Everything is housed within data variable.

                //Array of the Data Returned
                var StudentInformation = data.split(" ");

                //Student First Name
                var studentFirstName = StudentInformation[0];
                //Student Last Name
                var studentLastName = StudentInformation[1];
                //Student Middle Name
                var studentMiddleName  = StudentInformation [2];

                //Student ID found
                var studentID = StudentInformation[3];

                //# of Matches
                var matches = StudentInformation[4];

                alert(studentID);
                alert(matches);


                //To Do
                //Need to also pull student EMPLID and TERM.


                //End To Do


                //Using BOOLEAN setMATCH() from the queryPull.php page.
                //1 = True, if it's not 1, then we could assume that it's going to be false.
                if(matches!=1){
                    //For testing and debugging purposes only...
                    //alert('Nothing has returned!');



                    //First remove the plain "#" that is set up by default.
                    $("#submissionFORM").removeAttr("action");



                    //Clear any error message that might currently be there.
                    $("#errors").html();


                    //Two Year Digits of the term
                    //selected, so that is in a readable format.
                    //Must assign the value above the lastDIGITS_OF_TERMVALUE below
                    //as there would be inconsistency in the format of the string value.
                    var termTWOYEAR = studentTERM.toString().substr(1,2);


                    //Now, utilize the term values into a readable format that end users will be able
                    //to understand easily remember which value from the drop-down they selected.
                    var lastDIGITS_OF_TERMVALUE = studentTERM.substr(3,4);

                    if(lastDIGITS_OF_TERMVALUE=="8"){
                        studentTERM="Fall";
                    }
                    else if(lastDIGITS_OF_TERMVALUE=="1"){
                        studentTERM="Spring";
                    }
                    else if (lastDIGITS_OF_TERMVALUE=="6"){
                        studentTERM="Summer 1";
                    }
                    else if (lastDIGITS_OF_TERMVALUE=="7"){
                        studentTERM="Summer 2";
                    }
                    //End assignments of names.


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
                    $("#errors").append("Term of Housing Application: "+studentTERM + " " + 20+termTWOYEAR);
                }
                //There is a match from the database lookup.
                else {


                    //NeW
                    //Go to page2.php with my post parameters.
                    //example....
                    //$().redirect('demo.php', {'arg1': 'value1', 'arg2': 'value2'});
                    $.redirect('page2.php', {'parental_email': 'email', 'student_date_of_birth': 'student_dob', 'date_of_housing_application': 'housing_application_process_date','retrieved_student_first_name': studentFirstName,'retrieved_student_last_name': studentLastName,'retrieved_student_middle_name':studentMiddleName, 'retrieved_student_emplid':studentID});
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