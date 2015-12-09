<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 12/7/2015
 * Time: 8:59 AM
 * Description:  TO DO TO DO TO DO
 */
//Connection information (required for queryPull).
include('db/log-on.php');

//Get information necessary for my classes.
//File used to pull the data from PeopleSoft.
include('classes/queryPull.php');

//New object
$connectionForParentalConsent = new queryPull($database_host,$username,$password);

//New query
//DEVELOPMENT
//START DEVELOPMENT QUERIES.
            //TABLE: LOCALHOST_PARENTAL_CONSENT
            //EXAMPLE BELOW OF NO NAMED PARAMETERS.
            //$query_FOR_PARENTAL_CONSENT = "SELECT NC_PROCESS_DTTM,SS_STAT_INDICATOR,BIRTHDATE,EMAIL_ADDR,MIDDLE_NAME,FIRST_NAME,LAST_NAME,STRM,EMPLID from LOCALHOST_PARENTAL_CONSENT";

            //NAMED PARAMETERS.
            //FOUR TOTAL PARAMETERS.
            //001 - Parental EMail Address
            //002 - Student Date of Birth
            //003 - Housing Application Submitted
            //004 - Term of Application

            //Basic query... not working due to time constraint with the time field next to the DATE.
            //$query_FOR_PARENTAL_CONSENT = "SELECT NC_PROCESS_DTTM,SS_STAT_INDICATOR,BIRTHDATE,EMAIL_ADDR,MIDDLE_NAME,FIRST_NAME,LAST_NAME, STRM, EMPLID FROM LOCALHOST_PARENTAL_CONSENT WHERE EMAIL_ADDR=:parentalEMailAddress AND BIRTHDATE=:studentDOB AND NC_PROCESS_DTTM=:housingApplication AND STRM=:termNEEDED";


            /**
             *  QUERY FOR LOOKING UP DATA (DEVELOPMENT)
             */
            $query_FOR_PARENTAL_CONSENT =  "SELECT
                                            LOCALHOST_PARENTAL_CONSENT.EMPLID,
                                            LOCALHOST_PARENTAL_CONSENT.LAST_NAME,
                                            LOCALHOST_PARENTAL_CONSENT.MIDDLE_NAME,
                                            LOCALHOST_PARENTAL_CONSENT.FIRST_NAME,
                                            LOCALHOST_PARENTAL_CONSENT.EMAIL_ADDR,
                                            LOCALHOST_PARENTAL_CONSENT.BIRTHDATE,
                                            LOCALHOST_PARENTAL_CONSENT.NC_PROCESS_DTTM,
                                            LOCALHOST_PARENTAL_CONSENT.STRM
                                            FROM LOCALHOST_PARENTAL_CONSENT
                                            WHERE LOCALHOST_PARENTAL_CONSENT.BIRTHDATE >= TO_DATE(:studentDOB,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.BIRTHDATE < =TO_DATE(:studentDOBPLUSONE,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.NC_PROCESS_DTTM >= TO_DATE(:housingApplication,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.NC_PROCESS_DTTM < =  TO_DATE(:housingApplicationPLUSONE,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.EMAIL_ADDR =:parentalEMailAddress
                                            AND LOCALHOST_PARENTAL_CONSENT.STRM =:termNEEDED";

            $query_FOR_PARENTAL_CONSENT_GET_COUNT = "SELECT COUNT(LOCALHOST_PARENTAL_CONSENT.EMPLID)
                                            FROM LOCALHOST_PARENTAL_CONSENT
                                            WHERE LOCALHOST_PARENTAL_CONSENT.BIRTHDATE >= TO_DATE(:studentDOB,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.BIRTHDATE < =TO_DATE(:studentDOBPLUSONE,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.NC_PROCESS_DTTM >= TO_DATE(:housingApplication,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.NC_PROCESS_DTTM < =  TO_DATE(:housingApplicationPLUSONE,'MM/DD/YYYY')
                                            AND LOCALHOST_PARENTAL_CONSENT.EMAIL_ADDR =:parentalEMailAddress
                                            AND LOCALHOST_PARENTAL_CONSENT.STRM =:termNEEDED";


//END DEVELOPMENT QUERIES


//Set up the connection
$connection = $connectionForParentalConsent->getCONN();
//Create the parsing of the new query. [USED FOR STUDENT FIELDS]
$PARSED_CONNECTION_FOR_STUDENT_FIELDS = $connectionForParentalConsent->queryParse($connection,$query_FOR_PARENTAL_CONSENT);

//Get my StatementHandler.
//[USED FOR STUDENT FIELDS]
$STID_PARENTAL_CONSENT_CONNECTION_FIELDS = $connectionForParentalConsent->getSTID();   /*Use for query execute & binding parameters (when needed)*/
//BIND THE INFORMATION THAT WE NEED.

//QUERY MUST HAVE A NAMED PARAMETER.
//EXAMPLE:
//oci_bind_by_name($STID_ASSIGNED_STUDENTS,'termNEEDED',$myTERM);
//End example.

//Use the functions for binding terms set-up in checkData file, that also uses
//the newly created bindParentalEMailAddress, bindStudentDateOfBirth,bindResidentHousingApplication and bindTerm
//functions.


//test
/*
$parentalEMail=$_GET['parentalemail'];
$studentDOB=$_GET['studentDOB'];
$housingAgreementSubmissionDate=$_GET['housingAgreementSubmissionDate'];
$myTerm=$_GET['TERM'];
*/


//Hard Coded  [working
//Commented out 12-08-2015.
//$parentalEMail="papajohnson@hotmail.com";
//$studentDOB="03/07/1994";
//$studentDOBPLUSONE="03/08/1994";                            /*PLUS ONE TO THE DATE OF BIRTH*/
//$housingAgreementSubmissionDate="02/09/2016";
//$housingAgreementSubmissionDatePLUSONE="02/10/2016";        /*PLUS ONE TO THE HOUSING APPLICATION DATE*/
//$myTerm=2166;
//End Hard Coded [working]

//Commented out on 12/8/2015
//at 2:58pm
//commented out on 12/8/2015 @ 3:43pm
//$parentalEMail=$_POST['parental_email'];
$parentalEMail = $_POST['parentalEMAIL'];

$studentDOB=$_POST['student_date_of_birth'];
//Below is automatically set.
//echo $studentDOB;
//Get the student's date of birth.
$studentDOBPLUSONE_TEMP = new DateTime($studentDOB);
//Modify the date so that it is 1 date higher than the student's DOB.
$studentDOBPLUSONE_TEMP->modify('+1 day');
//Format the date of the PLUS 1 value.
//format that we want for the use of the DateTime class is
//m/d/Y, this will provide a format  like 01/25/1976
$studentDOBPLUSONE=$studentDOBPLUSONE_TEMP->format('m/d/Y');

//Print the date to the screen (just for debugging).
//echo $studentDOBPLUSONE->format('m/d/Y');


//Commented out on 12-09-2015.
//$studentDOBPLUSONE="03/08/1994";                            /*PLUS ONE TO THE DATE OF BIRTH*/
$housingAgreementSubmissionDate=$_POST['date_of_housing_application'];

//Commented out on 12-09-2015.
//$housingAgreementSubmissionDatePLUSONE="02/10/2016";        /*PLUS ONE TO THE HOUSING APPLICATION DATE*/

//Set a new DateTime object with the information that was provided by the end user as the date
//for the date the housing agreement was submitted, this field comes from the NC_PROCESS_DTTM
//field.
$housingAgreementSubmissionDatePLUSONE_TEMP = new DateTime($housingAgreementSubmissionDate);
//Modify the date so that it is 1 date higher than the date the housing agreement was submitted.
$housingAgreementSubmissionDatePLUSONE_TEMP->modify('+1 day');
//FOrmat the date of the PLUS 1 value.
//format that we want for the use of the DateTime class is
//m/d/Y, this will provide a format like 01/25/1967.
$housingAgreementSubmissionDatePLUSONE = $housingAgreementSubmissionDatePLUSONE_TEMP->format('m/d/Y');


//Pull the term value (2158, 2187, 2141, etc.) from the drop-down list on index.php.
$myTerm=$_POST['term_of_housing_application'];


//test URL
//localhost/apps/development/parental_consent/test_connection_and_class.php?parentalemail=papajohnson@hotmail.com&studentDOB=15-Jan-90&housingAgreementSubmissionDate=05-Feb-16&TERM=2166
//end test URL
//end test

/**
 * BIND PARAMETERS TO THE LOOKUP QUERY.
 */

//FOR QUERY LOOKING FOR FIELDS TO USE THROUGHOUT THE APPLICATION.
        //BindEmailAddress
        //FIELD #1
        //PARENTAL E-Mail Address field
        //NAME: parental_email
        //Specifically looking for a particular parental e-mail address.
        $connectionForParentalConsent->bindParentalEMailAddress($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'parentalEMailAddress',$parentalEMail);

        //Bind Student Date of Birth
        //FIELD #2
        //STUDENT DOB
        //NAME:student_date_of_birth
        //Specifically looking for a student DOB
        $connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'studentDOB',$studentDOB);

        //STUDENT DATE OF BIRTH-PLUS ONE
        $connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'studentDOBPLUSONE',$studentDOBPLUSONE);


        //Bind Housing Application Date
        //FIELD #3
        //DATE OF HOUSING APPLICATION
        //NAME:date_of_housing_application
        //Specifically looking for the date of Housing Application
        $connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'housingApplication',$housingAgreementSubmissionDate);

        //HOUSING APPLICATION DATE - PLUS ONE
        $connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'housingApplicationPLUSONE',$housingAgreementSubmissionDatePLUSONE);

        //Bind the Term that all the information is located.
        //FIELD #4
        //TERM OF APPLICATION
        //NAME: term_of_housing_application
        ////Specifically looking for the Housing Term for the application.
        $connectionForParentalConsent->bindTerm($STID_PARENTAL_CONSENT_CONNECTION_FIELDS,'termNEEDED',$myTerm);
//END QUERY FOR FIELDS TO USE THROUGHOUT THE APPLICATION.


//Execute query #1
//USED FOR GATHERING FIELDS TO PASS ACROSS THE APPLICATION.
$connectionForParentalConsent->queryExecute($STID_PARENTAL_CONSENT_CONNECTION_FIELDS);

//Get the first and last name of the query lookup.
$student_FIRST_LAST_NAME = $connectionForParentalConsent->getStudentName($STID_PARENTAL_CONSENT_CONNECTION_FIELDS);

echo $student_FIRST_LAST_NAME;



//See the fields provided by the first query search.

//Commented out on 2:28pm,
//12/08/2015.
//$connectionForParentalConsent->createTableDisplay($STID_PARENTAL_CONSENT_CONNECTION_FIELDS);

/********************************
 * QUERY #2
 *********************************/


$PARSED_CONNECTION_FOR_COUNT_ROW = $connectionForParentalConsent->queryParse($connection,$query_FOR_PARENTAL_CONSENT_GET_COUNT);

//Get my StatementHandler
//Used for receiving count.
$STID_PARENTAL_CONSENT_CONNECTION_COUNT = $connectionForParentalConsent->getSTID();   /*Use for query execute & binding parameters (when needed)*/

//FOR THE RETURN COUNT QUERY.
//BindEmailAddress
//FIELD #1
//PARENTAL E-Mail Address field
//NAME: parental_email
//Specifically looking for a particular parental e-mail address.
$connectionForParentalConsent->bindParentalEMailAddress($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'parentalEMailAddress',$parentalEMail);

//Bind Student Date of Birth
//FIELD #2
//STUDENT DOB
//NAME:student_date_of_birth
//Specifically looking for a student DOB
$connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'studentDOB',$studentDOB);

//STUDENT DATE OF BIRTH-PLUS ONE
$connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'studentDOBPLUSONE',$studentDOBPLUSONE);


//Bind Housing Application Date
//FIELD #3
//DATE OF HOUSING APPLICATION
//NAME:date_of_housing_application
//Specifically looking for the date of Housing Application
$connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'housingApplication',$housingAgreementSubmissionDate);

//HOUSING APPLICATION DATE - PLUS ONE
$connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'housingApplicationPLUSONE',$housingAgreementSubmissionDatePLUSONE);

//Bind the Term that all the information is located.
//FIELD #4
//TERM OF APPLICATION
//NAME: term_of_housing_application
////Specifically looking for the Housing Term for the application.
$connectionForParentalConsent->bindTerm($STID_PARENTAL_CONSENT_CONNECTION_COUNT,'termNEEDED',$myTerm);

//END FOR THE RETURNED COUNT QUERY.

/**
 * END BIND PARAMETERS FOR THE COUNT.
 */

//Execute query #2
//USED FOR PROVIDING A COUNT OF RETURNED INFORMATION
$connectionForParentalConsent->queryExecute($STID_PARENTAL_CONSENT_CONNECTION_COUNT);



//For debugging purposes only.
//See the returned row(s) by the query lookup.
//$connectionForParentalConsent->createTableDisplay($STID_PARENTAL_CONSENT_CONNECTION_COUNT);

//Get Count
$fieldNAME = "LOCALHOST_PARENTAL_CONSENT.EMPLID";
$count = $connectionForParentalConsent->retrieveCount($STID_PARENTAL_CONSENT_CONNECTION_COUNT,$fieldNAME);

//Set the Match flag if there are any returned values.
$matchesPROVIDED = $connectionForParentalConsent->setMatch($count);

//This will be beneficial when using AJAX to send information over to this page to see if there are any matches after the person
//presses the continue button.

//If there are any matches.... let us know.
echo $matchesPROVIDED;






?>




