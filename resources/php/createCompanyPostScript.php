<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */

session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/resources/php/generalFunctions.php';
require $_SERVER['DOCUMENT_ROOT'] . '/resources/php/companyFunctions.php';


$mysqli = createDBConnection();//create DB connection
$result = insertCompany($mysqli, $_POST['companyID'],
                        $_SESSION['user_id'], $_POST['post_title'],
                        $_POST['pos_content'], $_POST['jobrating']);
$mysqli->close();

?>
