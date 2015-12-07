<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 12/7/2015
 * Time: 8:59 AM
 */
//Connection information (required for queryPull).
include('db/log-on.php');

//Get information necessary for my classes.

//File used to pull the data from PeopleSoft.
include('classes/queryPull.php');

//File needed to get matches and move forward throughout the web-app.
include('classes/checkData.php');

//Create new object.
$myData = new checkData();

$connectionForParentalConsent = new queryPull($database_host,$username,$password);

//New query
//DEVELOPMENT
//START DEVELOPMENT QUERIES.
            //TABLE: LOCALHOST_PARENTAL_CONSENT
            //EXAMPLE BELOW OF NO NAMED PARAMETERS.
            $query_FOR_PARENTAL_CONSENT = "SELECT NC_PROCESS_DTTM,SS_STAT_INDICATOR,BIRTHDATE,EMAIL_ADDR,MIDDLE_NAME,FIRST_NAME,LAST_NAME,STRM,EMPLID from LOCALHOST_PARENTAL_CONSENT";

            //NAMED PARAMETERS.
            //$query_FOR_PARENTAL_CONSENT = "SELECT NC_PROCESS_DTTM,SS_STAT_INDICATOR,BIRTHDATE,EMAIL_ADDR,MIDDLE_NAME,FIRST_NAME,LAST_NAME,STRM,EMPLID WHERE STRM=:termNEEDED from 'LOCALHOST_PARENTAL_CONSENT'";
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

//EXAMPLE 01: TERM!
//Only needed when looking for specific information.
//oci_bind_by_name($STID_PARENTAL_CONSENT_CONNECTION,'termNEEDED',$myTerm);

//Execute query.
$connectionForParentalConsent->queryExecute($STID_PARENTAL_CONSENT_CONNECTION);

//For debugging purposes only.
$connectionForParentalConsent->createTableDisplay($STID_PARENTAL_CONSENT_CONNECTION);

?>
