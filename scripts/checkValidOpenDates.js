/**
 * Date: 12/10/2015
 * Name: checkValidOpenDate.js
 * Description:
 *
 *
 */

//Get Today's Date....
//var todaysDate = new Date(2015,12,02);          /*January 02, 2016.*/
var todaysDate = new Date(2016,09,02);          /*January 02, 2017.*/

//var todaysDate = new Date();                      /*Current Date and Time*/

var month = todaysDate.getDate(); /*returns month*/
var year = todaysDate.getFullYear(); /*Returns year*/

var currentMonthYear = month+"/"+year;
//End Necessary Variables.






//Open Date of Summer 1
/*Using the current year as the standard.*/
var openSummer1Date = new Date(year, 3, 15);
var closeSummer1Date = new Date(year, 5, 30);
//Check Summer 2
var openSummer2Date = new Date(year, 4, 15);
var closeSummer2Date= new Date(year, 7, 30);
//Check Fall
var openFallDate = new Date(year-1, 12, 01);      /*THis value automatically goes to January of the next year.*/
var closeFallDate= new Date(year, 11, 31);
//Check Spring
var openSpringDate = new Date(year, 9, 01);
var closeSpringDate= new Date(year+1, 4, 30);


function incrementDates(todaysDate){
    //Raise year if the date has passed.
    //Summer 1 close date.
    if(todaysDate>closeSummer1Date){
        //Set the new year of the new Summer 1 opening date
        openSummer1Date.setFullYear(year+1);
        //Set the new year of the new Summer 1 closing date.
        closeSummer1Date.setFullYear(year+1);

    }
    //Summer 2 close date
    if(todaysDate>closeSummer2Date){
        //Set the new year of the new Summer 1 opening date
        openSummer2Date.setFullYear(year+1);
        //Set the new year of the new Summer 2 closing date.
        closeSummer2Date.setFullYear(year+1);
    }
    //Fall open date
    //Must increment the year of the Fall opening date if it has been passed.
    //Fall does not really increment as it's January - December of the calendar year.
    /*
    if(todaysDate>openFallDate){
        //Set the new year of the new Fall closing date.
        openFallDate.setFullYear(year+1);
        //Set the new year of the new Fall closing date.
        closeFallDate.setFullYear(year+1);

    }*/
    //Spring open date
    if(todaysDate>closeSpringDate){
        //Set the new year of the new Spring opening date
        openSpringDate.setFullYear(year+1);


    }

}

/*Provided by http://jsfiddle.net/apougher/H3H8s/*/
function dateCheck(currentDate,dateRangeStart,dateRangeEnd){
    //var currentDate,dateRangeStart,dateRangeEnd;
    if((currentDate <= dateRangeEnd && currentDate >= dateRangeStart)) {
        //alert("true");
        return true;
    }
    //alert("false");
    return false;
}


function checkValidOpenDatesFall(){

    //Run the incremental date updates...
    incrementDates(todaysDate);


    //Get against Fall terms
    var valid  = dateCheck(todaysDate,openFallDate,closeFallDate);

    //Date we are comparing the date to is:
    document.write("<br/>");

    //Print out to the screen...
    document.write("<STRONG>"+todaysDate+"</STRONG>");

    document.write("<br/>");

    //Open Fall Date.
    document.write(openFallDate);

    document.write("<br/>");

    //Close Fall date
    document.write(closeFallDate);

    document.write("<br/>");

    document.write("VALID FOR FALL ?"+valid);

}


function checkValidOpenDatesSummer1(){

    //Run the incremental date updates...
    incrementDates(todaysDate);


    //Get against Summer 1 opening and closing dates.
    var validForSummer1  = dateCheck(todaysDate,openSummer1Date,closeSummer1Date);

    //Date we are comparing the date to is:
    document.write("<br/>");

    //Print out to the screen...
    document.write("<STRONG>"+todaysDate+"</STRONG>");

    document.write("<br/>");

    //Open Fall Date.
    document.write(openSummer1Date);

    document.write("<br/>");

    //Close Fall date
    document.write(closeSummer1Date);

    document.write("<br/>");


    document.write("VALID FOR SUMMER 1 ?"+validForSummer1);

}

function checkValidOpenDatesSummer2(){

    //Run the incremental date updates...
    incrementDates(todaysDate);


    //Get against Summer 2 opening and closing dates.
    var validForSummer2  = dateCheck(todaysDate,openSummer2Date,closeSummer2Date);

    //Date we are comparing the date to is:
    document.write("<br/>");

    //Print out to the screen...
    document.write("<STRONG>"+todaysDate+"</STRONG>");

    document.write("<br/>");

    //Open Fall Date.
    document.write(openSummer2Date);

    document.write("<br/>");

    //Close Fall date
    document.write(closeSummer2Date);

    document.write("<br/>");


    document.write("VALID FOR SUMMER 2 ?" + validForSummer2);

}







function checkValidOpenDatesSpring(){

    //Run the incremental date updates...
    incrementDates(todaysDate);


    //Get against Spring 1 opening and closing dates.
    var validForSpring1  = dateCheck(todaysDate,openSpringDate,closeSpringDate);

    //Date we are comparing the date to is:
    document.write("<br/>");

    //Print out to the screen...
    document.write("<STRONG>"+todaysDate+"</STRONG>");

    document.write("<br/>");

    //Open Fall Date.
    document.write(openSpringDate);

    document.write("<br/>");

    //Close Fall date
    document.write(closeSpringDate);

    document.write("<br/>");


    document.write("VALID FOR SPRING TERM ?" + validForSpring1);

}
























/**
 /*
 //Today's date....
 document.write("TODAYS DATE: "+todaysDate);


 document.write("<br>");



 //Open Summer 1 Open Date
 document.writeln("Summer 1 Open DATE: "+openSummer1Date);

 document.write("<br>");

 document.writeln("Summer 1 Close DATE: "+closeSummer1Date);

 document.write("<br>");

 //Open Summer 2 Open Date
 document.writeln("Summer 2 Open DATE: "+openSummer2Date);

 document.write("<br>");

 //Close Summer 2 Date
 document.writeln("Summer 2 Close DATE: "+closeSummer2Date);

 document.write("<br>");

 //Open Fall Date
 document.writeln("Fall open DATE: "+openFallDate);

 document.write("<br>");

 //Close Fall Date
 document.writeln("Fall close DATE: "+closeFallDate);
 */
