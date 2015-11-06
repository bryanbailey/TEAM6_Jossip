<?php

/**
 * Created by PhpStorm.
 * User: Praveen
 * Date: 11/6/2015
 * Time: 5:45 PM
 */
$_POST['username']='PK1';
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
