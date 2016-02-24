/**
 * Date: 12/10/2015
 * Name: checkValidOpenDate.js
 * Description:
 *
 *
 */

//ALL MONTHS NUMBERS START WITH ZERO, SO JUNE, THE 6TH MONTH WILL BE 5. 9 WILL BE OCTOBER (10TH MONTH), ETC.
//Get Today's Date....
//var todaysDate = new Date(2016,5,20);          /*June 20, 2016.*/
var todaysDate = new Date(2016,9,01); /*FIRST DATE OF SPRING TERM, 10-01-2016*/


//var todaysDate = new Date(2018,00,15);          /*January 02, 2017.*/
//var todaysDate = new Date();                      /*Current Date and Time*/

var month = todaysDate.getDate(); /*returns month*/
var year = todaysDate.getFullYear(); /*Returns year*/

var currentMonthYear = month+"/"+year;

var termCODE;               /*TERM CODE USED FOR PEOPLE SOFT. i.e. 2151,2158,2168.*/
//End Necessary Variables.


//Open Date of Summer 1
/*Using the current year as the standard.*/
var openSummer1Date = new Date(year, 3, 15);
var closeSummer1Date = new Date(year, 5, 30);
//Check Summer 2
var openSummer2Date = new Date(year, 4, 0);
var closeSummer2Date= new Date(year, 7, 30);
//Check Fall
var openFallDate = new Date(year-1, 12, 01);      /*THis value automatically goes to January of the next year.*/
var closeFallDate= new Date(year, 11, 31);
//Check Spring
var openSpringDate = new Date(year, 9, 01);
var closeSpringDate= new Date(year, 4, 30);


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

    //Make the Spring opening date 1 year higher than the current date, if today's date has passed it.
    if(todaysDate>openSpringDate){
        openSpringDate.setFullYear(year+1);
    }

    //Make the Spring closing date 1 year higher than the current date if today's date has passed the value.
    else if(todaysDate>closeSpringDate){
        //Set the new year of the new Spring opening date
        closeSpringDate.setFullYear(year+1);
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
    var validForFall  = dateCheck(todaysDate,openFallDate,closeFallDate);

    if(validForFall==1){
        //Trim year to two digits.
        year2DIGITS = year.toString().substr(2,2);
        termCODE="2"+year2DIGITS+"8";
    }
    //Do nothing
    else{


    }

    return validForFall;
}

function checkValidOpenDatesSummer1(){
    //Run the incremental date updates...
    incrementDates(todaysDate);

    //Get against Summer 1 opening and closing dates.
    var validForSummer1  = dateCheck(todaysDate,openSummer1Date,closeSummer1Date);

    if(validForSummer1==1){
        //Trim year to two digits.
        year2DIGITS = year.toString().substr(2,2);
        termCODE="2"+year2DIGITS+"6";
    }
    //Do nothing
    else{
    }

    return validForSummer1;

}

function checkValidOpenDatesSummer2(){
    //Run the incremental date updates...
    incrementDates(todaysDate);
    //Get against Summer 2 opening and closing dates.
    var validForSummer2  = dateCheck(todaysDate,openSummer2Date,closeSummer2Date);

    if(validForSummer2==1){
        //Trim year to two digits.
        year2DIGITS = year.toString().substr(2,2);
        termCODE="2"+year2DIGITS+"7";
    }
    //Do nothing
    else{


    }

    return validForSummer2;
}

function checkValidOpenDatesSpring(){
    //Run the incremental date updates...
    incrementDates(todaysDate);


    //Note: On 10-01-2016 or subsequent dates (10-02, 10-03) the Spring 2016 drop down will automatically
    //populate in this file.

    if(todaysDate<=openSpringDate){
                //Get against Spring 1 opening and closing dates.
                //Remove the year by 1, so that it can be picked the year (during the fall term)
                // before the actual Spring semester starts.
                openSpringDate.setFullYear(year);
    }else{
        openSpringDate.setFullYear(year+1);
    }

    var validForSpring1  = dateCheck(todaysDate,openSpringDate,closeSpringDate);
    if(validForSpring1==1){
        //Trim year to two digits of the closing Spring date, as it will have
        //the upcoming year on it.
        //E.g. displaying information during Oct 2015 will show Spring 2016 or 2161 information.
        yearForSpringUpdate=closeSpringDate.getFullYear();

        year2DIGITS_SPRING = yearForSpringUpdate.toString().substr(2,2);
        termCODE="2"+year2DIGITS_SPRING+"1";
    }
    //Do nothing
    else{
    }

    return validForSpring1;
}

function getTermValue(){
    return termCODE;
}

function getValidTermsforDropDown(arrayName){

    for(i=0;i<arrayName.length;i++){
        //Term, Spring, Summer 1 or Summer 2, Fal.
        var Term = arrayName[i].toString().substr(3,4);

        //Check the kind of term it is based on the available number
        if(Term==8){
            Term="Fall";
        }
        else if(Term==1){
            Term="Spring";
        }
        else if (Term==6){
            Term="Summer 1";
        }
        else if (Term==7){
            Term="Summer 2";
        }
        //Two Year Digits
        var termTWOYEAR = arrayName[i].toString().substr(1,2);
        document.write("<option value="+arrayName[i]+">"+Term+" "+"20"+termTWOYEAR+"</option>");
    }//*.. close the for loop.
}//close getValidTerms function

function displayTermsAvailable(arrayName){

    for(i=0;i<arrayName.length;i++){
        document.write(arrayName[i]+",");
    }
}


