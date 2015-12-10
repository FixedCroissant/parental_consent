

//Run the script that is currently in the checkValidOpenDates file.
var fall = checkValidOpenDatesFall();                /*Check today's date against Fall term open and close app*/

var availableTerms = new Array();


//Get Term Value if the current date is between Fall application dates
if(fall==1){
    termCODE_Fall= getTermValue();

    //For testing purposes only.
    //document.write(termCODE_Fall);
    //document.write("<br/>");

    //Add to my collection of available terms.
    availableTerms.push(termCODE_Fall);
}
var summer1 = checkValidOpenDatesSummer1();             /*Check today's date against the Summer 1 term open and close app*/
//Get Term Value if the current date is between Summer 1 application dates
if(summer1==1){
    termCODE_Summer1= getTermValue();

    //For testing purposes only.
    //document.write(termCODE_Summer1);
    //document.write("<br/>");

    //Add to my collection of available terms.
    availableTerms.push(termCODE_Summer1);
}

var summer2 = checkValidOpenDatesSummer2();             /*CHeck today's date against the Summer 2 term open and close app*/

//Get Term Value if the current date is between Summer 2 application dates
if(summer2==1){
    termCODE_Summer2 = getTermValue();

    //For testing purposes only.
    //document.write(termCODE_Summer2);
    //document.write("<br/>");

    //Add to my collection of available terms.
    availableTerms.push(termCODE_Summer2);
}

var spring = checkValidOpenDatesSpring();              /*Check today's date against the Spring term open and close app*/
//Get Term Value if the current date is between spring application dates
if(spring==1){
    termCODE_Spring= getTermValue();

    //For testing purposes only.
    //document.write(termCODE_Spring);
    //document.write("<br/>");

    //Add to my collection of available terms.
    availableTerms.push(termCODE_Spring);
}

//What terms are currently available?
//Print it out below.
//displayTermsAvailable(availableTerms);






