<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/13/2015
 * Time: 10:52 AM
 */

session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/resources/php/generalFunctions.php';
require $_SERVER['DOCUMENT_ROOT'] . '/resources/php/positionFunctions.php';

$mysqli = createDBConnection();//create DB connection
$result = postPosition($mysqli, $_SESSION['user_id'], $_POST['company'], $_POST['position'], $_POST['content']);
$mysqli->close();

/*
 * print result of insertion back to calling page
 *  (not required to be handled by calling page)
 */
echo $result;



?>