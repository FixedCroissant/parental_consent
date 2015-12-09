/**
 * Created by jjwill10 on 12/8/2015.
 */
//If there are matches in the database look up AND the person has not submitted the
//form in the past. Change the form to go to the next page.

$(function changeFORM(){
    var newURL = "page2.php";

    //$("#submissionFORM").removeAttr("action");
        //$("#submissionFORM").attr("Action",newURL);

    //This is the correct selector to use.
    $("#submissionFORM").hide();
});
