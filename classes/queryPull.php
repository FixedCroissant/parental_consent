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