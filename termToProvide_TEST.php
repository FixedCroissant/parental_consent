<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 12/2/2015
 * Time: 11:30 AM
 */

//include the current term based on our date.
include('includes/provideTERMAUTO.php');

//Note: The term is called $myTERM.


echo "The current term is ";
echo $myTERM;

echo "<br/>";
echo "<br/>";


/**
 * USING THE DATE/TIME CLASS BUILT INTO PHP.
 * SEE: (http://php.net/manual/en/book.datetime.php)
 * FOR REFERENCE.
 */
//Create new date based on today's date.
$todaysDATE = new DateTime();
//Format the date based on YYYY-MM-DD
$todaysDATEPROPER_FORMATTING = $todaysDATE->format('Y-m-d');


echo "<br/>";


echo $todaysDATEPROPER_FORMATTING;


//Using Date duration difference function....



//End using date duration difference function ...