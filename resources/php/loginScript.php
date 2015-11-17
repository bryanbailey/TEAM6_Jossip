<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 5:32 PM
 *
 *  Login script is run either directly from a HTML form or an AJAX call.
 *  Login script requires generalFunctions.php for the mysqli connection
 *  Login script requires loginFunctions.php for various login functions
 *      ** these were kept in a separate file so they could also be included in test scripts
 *
 */

require $_SERVER['DOCUMENT_ROOT'].'/resources/php/generalFunctions.php';
require $_SERVER['DOCUMENT_ROOT'].'/resources/php/loginFunctions.php';

//post variables from login.php
$username = $_POST['username'];
$password = $_POST['password'];

$mysqli = createDBConnection();//create DB connection (will be used by functions inside loginFunctions.php, below)
$salt = retrieveSalt($mysqli, $username);//retrieve salt (used to generate hash)
$hash = retrieveHash($password, $salt);//generate hash (stored password)
$loginRecord = loginRecord($mysqli, $username, $hash);//check db for user record
login($loginRecord);//login
$mysqli->close();


?>
