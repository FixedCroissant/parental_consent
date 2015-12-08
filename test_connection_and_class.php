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
            $query_FOR_PARENTAL_CONSENT = "
                                            SELECT LOCALHOST_PARENTAL_CONSENT.EMPLID,
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





//END DEVELOPMENT QUERIES


//Set up the connection
$connection = $connectionForParentalConsent->getCONN();
//Create the parsing of the new query.
$PARSED_CONNECTION = $connectionForParentalConsent->queryParse($connection,$query_FOR_PARENTAL_CONSENT);

//Get my StatementHandler.
$STID_PARENTAL_CONSENT_CONNECTION = $connectionForParentalConsent->getSTID();   /*Use for query execute & binding parameters (when needed)*/

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

$parentalEMail="papajohnson@hotmail.com";
$studentDOB="03/07/1994";
$studentDOBPLUSONE="03/08/1994";                            /*PLUS ONE TO THE DATE OF BIRTH*/
$housingAgreementSubmissionDate="02/09/2016";
$housingAgreementSubmissionDatePLUSONE="02/10/2016";        /*PLUS ONE TO THE HOUSING APPLICATION DATE*/
$myTerm=2166;


//test URL
//localhost/apps/development/parental_consent/test_connection_and_class.php?parentalemail=papajohnson@hotmail.com&studentDOB=15-Jan-90&housingAgreementSubmissionDate=05-Feb-16&TERM=2166
//end test URL
//end test

/**
 * BIND PARAMETERS TO THE LOOKUP QUERY.
 */
//BindEmailAddress
//FIELD #1
//PARENTAL E-Mail Address field
//NAME: parental_email
//Specifically looking for a particular parental e-mail address.
$connectionForParentalConsent->bindParentalEMailAddress($STID_PARENTAL_CONSENT_CONNECTION,'parentalEMailAddress',$parentalEMail);

//Bind Student Date of Birth
//FIELD #2
//STUDENT DOB
//NAME:student_date_of_birth
//Specifically looking for a student DOB
$connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION,'studentDOB',$studentDOB);

//STUDENT DATE OF BIRTH-PLUS ONE
$connectionForParentalConsent->bindStudentDateOfBirth($STID_PARENTAL_CONSENT_CONNECTION,'studentDOBPLUSONE',$studentDOBPLUSONE);


//Bind Housing Application Date
//FIELD #3
//DATE OF HOUSING APPLICATION
//NAME:date_of_housing_application
//Specifically looking for the date of Housing Application
$connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION,'housingApplication',$housingAgreementSubmissionDate);

//HOUSING APPLICATION DATE - PLUS ONE
$connectionForParentalConsent->bindResidentHousingApplication($STID_PARENTAL_CONSENT_CONNECTION,'housingApplicationPLUSONE',$housingAgreementSubmissionDatePLUSONE);

//Bind the Term that all the information is located.
//FIELD #4
//TERM OF APPLICATION
//NAME: term_of_housing_application
////Specifically looking for the Housing Term for the application.
$connectionForParentalConsent->bindTerm($STID_PARENTAL_CONSENT_CONNECTION,'termNEEDED',$myTerm);

/**
 * END BIND PARAMETERS TO THE LOOKUP QUERY.
 */

//Execute query.
$connectionForParentalConsent->queryExecute($STID_PARENTAL_CONSENT_CONNECTION);

//For debugging purposes only.
//Commented out on 11:00am,
//12/07/2015.
$connectionForParentalConsent->createTableDisplay($STID_PARENTAL_CONSENT_CONNECTION);
?>




