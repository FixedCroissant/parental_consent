<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 12/7/2015
 * Time: 9:14 AM
 */

class queryPull {

    /*Query Pull Information*/


    //Set variables
    var $setUSER;   //Username
    var $setPASS;   //Password
    var $setHOST;   //Host name
    var $CONN;      //Database Handler
    var $STID;      //Statement Handler.... used when parsing the query with the connection and when executing the actual query itself.

    //Set Name Information for the Returned Student Data.
    //Name Information ...

    //End Name Information

    //End Variables

    //Create Constructor for new database lookups.
    function queryPull($host,$userName,$userPass)
    {
        //First, create a connection based on necessary parameters.
        $this->createConnection($host,$userName,$userPass);
    }

    //Set the CONN (CONNECTION) that is initialized in the below createConnection method.
    function setCONN($ConnNewValue){
        $this->CONN=$ConnNewValue;
    }
    //Get the CONN whenever it is needed.
    function getCONN(){
        return $this ->CONN;
    }


    //Set up a new Oracle Connection
    function createConnection($host,$userName,$userPass){
        //Try to go and create a new PDO based connection...
        $conn = oci_connect($userName,$userPass,$host);

        //Set the variable to the conn.
        $this->setCONN($conn);

        //if there is any errors
        if(!$conn){
            //Set error
            #error variable is $error
            $error = oci_error();

            //Display an error on connection errors.
            trigger_error(htmlentities($error['message'],ENT_QUOTES),E_USER_ERROR);
        }



    }

    function queryParse($connection,$queryToUse){
        $tempSTID = oci_parse($connection,$queryToUse);

        //Assign the above Statement handler to our variable.
        $this->setSTID($tempSTID);
        //DONE.

    }
    function setSTID($newStatementHandler){
        //Set the STID variable to the variable passed in the method parameter.
        $this->STID=$newStatementHandler;
    }

    //Return what is in the statement handler.
    function getSTID(){
        return $this->STID;
    }


    /**
     * Function to help bind the parental e-mail address to the Oracle/PeopleSoft query lookup.
     * @param $STATEMENT_ID
     * @param $databaseFieldWeNeed
     * @param $fieldWeAreNeed
     * @return bool
     */
        function bindParentalEMailAddress($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify){
            return oci_bind_by_name($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify);
        }

    /**
     * Function to help bind the Student's Date of Birth to the Oracle/PeopleSoft query lookup.
     * @param $STATEMENT_ID
     * @param $databaseFieldWeNeed
     * @param $fieldWeAreNeed
     * @return bool
     */
    function bindStudentDateOfBirth($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify){
        return oci_bind_by_name($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify);
    }


    /**
     * Function to help bind the Housing Application Date (From View: Field_Name: NC_PROCESS_DTTM) to the Oracle/PeopleSoft query lookup.
     * @param $STATEMENT_ID
     * @param $databaseFieldWeNeed
     * @param $fieldWeAreNeed
     * @return bool
     */
    function bindResidentHousingApplication($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify){
        return oci_bind_by_name($STATEMENT_ID,$databaseFieldWeNeed,$fieldWeWantToSpecify);
    }


    /**
     * Function to help bind the TERM (or semester e.g. 2151, 2158 etc.) to the Oracle/PeopleSoft query lookup.
     * @param $STATEMENT_ID
     * @param $databaseFieldWeNeed
     * @param $fieldWeAreNeed
     * @return bool
     */
    function bindTerm($STATEMENT_ID,$termWeWant,$fieldWeAreChanging){
        return oci_bind_by_name($STATEMENT_ID,$termWeWant,$fieldWeAreChanging);
    }


    //Create a new query to read information
    //MUST HAVE A STID to execute the query properly.
    function queryExecute($STID){

        $QUERY_EXECUTE = oci_execute($STID);

        /**
         * temporary
         */


        // echo "<table border='1'>\n";
        // while ($row = oci_fetch_array($STID, OCI_ASSOC+OCI_RETURN_NULLS)) {
        //     echo "<tr>\n";
        //     foreach ($row as $item) {
        //         echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
        //     }
        //     echo "</tr>\n";
        // }
        // echo "</table>\n";


        /**
         * end temporary
         */

    }


    //Provide the student first name,last name, studentID of the first query lookup. (not the count of rows returned).
    //Also see whether or not they have already completed this application.
    function getStudentInformation($STID){
        //By default, put nothing in here.
		$already_completed_parental_application="";		
        $housing_app_completed_in_system="";
        $first_name="";
        $last_name="";
        $middle_name="";
        $student_ID = "";
        $student_DATE_OF_BIRTH = "";
        $parental_email_address = "";
        $student_app_date = "";


     //As long as there is something in the search.
         while($row=oci_fetch_array($STID,OCI_ASSOC)){
		   //Check whether or not they have already completed the Parental Agreement and if they have,
           //use this field to keep them from progressing forward within this application to move forward. (Onward to Page2.php)
           $already_completed_parental_application=$row["NC_SH_PRNTL_APPRVL"];
           //Check whether or not they have a completed housing application on file.
           $housing_app_completed_in_system=$row["SS_STAT_INDICATOR"];
           //Assign first name from the query lookup.
           $first_name = $row["FIRST_NAME"];
           //Assign last name from the query lookup.
           $last_name = $row["LAST_NAME"];
           //Assign middle name from the query lookup.
           $middle_name = $row["MIDDLE_NAME"];
           //Assign the ID from the query lookup.
           $student_ID = $row["EMPLID"];
           //Assign the student DOB to the query lookup.
           $student_DATE_OF_BIRTH = $row["BIRTHDATE"];
           //Assign the email
           $parental_email_address = $row["EMAIL_ADDR"];
           //Assign the application date
           $student_app_date_temp = $row["NC_PROCESS_DTTM"];
		   
		   //For whatever reason, if there is a " " (BLANK) in the field, lets write blank, as it 
		   //will trigger the condition if the end-user does not have any information within the "SS_STAT_INDICATOR" field.
		    //Create a condition that writes the word "BLANK" if there is nothing in the field.
			
			//Fields this affects
			//NC_SH_PRNTL_APPRVL (WHETHER THE END USER HAS ALREADY COMPLETED THIS WEB APPLICATION)
			//SS_STAT_INDICATOR (WHETHER THE STUDENT HAS A COMPLETED HOUSING APPLICATION)
			//MIDDLE_NAME       (FOR SOME WILD REASON THE QUERY DOES NOT PULL A MIDDLE NAME FOR THE STUDENT).			
			
			//Untouched below...
			/*
			if ($already_completed_parental_application==" "||$housing_app_completed_in_system==" "||$middle_name==" "){
				 $already_completed_parental_application="BLANK"; //Assign the word, BLANK, to whether or not the end user has completed this web application. 
                 $housing_app_completed_in_system="BLANK";	//Assign the word, BLANK, to the housing application status in MyPack Portal.
				 $middle_name="BLANK"; //Assign the word, BLANK, to the middle name pulled (remember to remove this on page3.php when it is displayed back to the user.)
		    }
			*end untouched.
			*/
			//Changes added for the above wrong condition on 02/01/2016.
			//If the field for NC_SH_PRNTL_APPRVL is blank, set the value that's sent back to PAGE1 to BLANK.
			if ($already_completed_parental_application==" "){
			$already_completed_parental_application="BLANK"; //Assign the word, BLANK, to whether or not the end user has completed this web application.
			}
			//If the SS_STAT_INDICATOR is blank, set the value that's sent back to PAGE1 to BLANK.
			else if($housing_app_completed_in_system==" "){
			$housing_app_completed_in_system="BLANK";	//Assign the word, BLANK, to the housing application status in MyPack Portal.
			}
			//If the Middle Name is blank, set the value back to Page1 to BLANK.
			else if($middle_name==" "){
				$middle_name="BLANK";
			}
			//End changes on 02/01/2016.		
			
			
           //End creating a condition...
		   
		   
		   
        }
		
		 //FORMAT OF NC_PROCESS_DTTM IS DD-MM-YY H:i:s.00000000 AM
		 //Only return a set amount of information.
		 //SHOULD RETURN DD-MM-YY
		   $date_of_application_formatted = substr($student_app_date_temp,0,9);
		   $student_app_date = $date_of_application_formatted;
		
		
        //Return information from the database lookup.
        //return $already_completed_parental_application." ".$housing_app_completed_in_system." ".$first_name." ".$last_name." ".$middle_name." ".$student_ID." ".$student_DATE_OF_BIRTH." ".$parental_email_address." ".$student_app_date;
		
		//To prevent empty fields from breaking the communication between this file and the scripts/checkInformation.js that is 
		//used within the /parental_consent/scripts/ let's make the field separator a "," (comma) vs an empty field.
		return $already_completed_parental_application.",".$housing_app_completed_in_system.",".$first_name.",".$last_name.",".$middle_name.",".$student_ID.",".$student_DATE_OF_BIRTH.",".$parental_email_address.",".$student_app_date.",";
		
	}


    function retrieveCount($STID,$FIELDNAME){
            while($row=oci_fetch_array($STID,OCI_ASSOC)){
               $count = $row["COUNT($FIELDNAME)"];
            }
        return $count;
    }

    function setMatch($countOfEMPLIDsReturned){
        if($countOfEMPLIDsReturned>=1){
            $match = TRUE;
        }else{
            $match = FALSE;
        }
        return $match;
    }



    //Used for reading the database table.
    //
    function createTableDisplay($STID){


        echo "<table border='1'>\n";
        while ($row = oci_fetch_array($STID, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";

    }

    /**
     * END READ THE DATA FROM ORACLE
     */
}