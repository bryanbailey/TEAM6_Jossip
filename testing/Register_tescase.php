<?php

/**
 * Created by PhpStorm.

 */
$_POST['username']='PK2';
$_POST['first_name']='Praveen';
$_POST['last_name']='kumar';
$_POST['email']='test@gmai.com';
$_POST['password']='1234';
include '/resources/php/registerScript.php';
if($queryResult=='1')
{
    echo 'Registration successfull';

}else
{
    echo 'already registered';
}
?>
