/**
 * Created by jjwill10 on 12/1/2015.
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
                                window.open('http://localhost/apps/development/parental_consent/declineAuthorization.php', 'window name', 'window settings');

                                //Automatically move to the new page without touching the update function.
                                //As an HTTP redirect (back button will not work )
                                //Go to the Thank You page after the person lets us know they do not want to agree
                                //to the student's authorization.
                                window.location.replace("http://localhost/apps/development/parental_consent/thankyou.html");

                            },
                                Cancel: function() {
                                $( this ).dialog( "close" );
                                }
                            }
                });




    });



});