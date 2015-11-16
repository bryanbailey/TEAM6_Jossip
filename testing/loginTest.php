<?php

/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/16/2015
 * Time: 9:18 AM
 */
require_once 'PHPUnit/Autoload.php';
require $_SERVER['DOCUMENT_ROOT'].'/resources/php/loginFunctions.php';

class loginTest extends PHPUnit_Framework_TestCase
{


    function testRetrieveSalt(){

        //"post" variable needed for function
        $username = "timoty";
        //db connection needed for function
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $salt = retrieveSalt($username);
            $this->assertEquals($salt, "1675870066562fafdd510302.39645971");

        //clean up test
        $mysqli->close();
    }









    /*
     * OLD TEST CASES BELOW, still valid
     */

    public function testMysqliConnection_WHITEBOX(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $connection = $mysqliConn->ping();
        $this->assertTrue($connection);
        $mysqliConn->close(); //cleanup test
    }

    public function testRetrieveSalt_WHITEBOX(){
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $saltSQL = "SELECT `salt` FROM `User` WHERE STRCMP(`username`, ?)=0 LIMIT 1";
        $stmt = $mysqli->prepare($saltSQL);
            $this->assertInstanceOf('mysqli_stmt', $stmt);

        $username = "keljoundi"; //valid test data to query

        $bindResult = $stmt->bind_param('s', $username);
            $this->assertTrue($bindResult);
        $executeResult = $stmt->execute();
            $this->assertTrue($executeResult);
        $saltResults = $stmt->get_result();
            $this->assertInstanceOf('mysqli_result', $saltResults);
            $this->assertEquals($saltResults->num_rows, 1);

        $mysqli->close();   //cleanup test
        $stmt->close();
    }

    public function testLogin_WHITEBOX(){
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $loginSQL = "SELECT `first_name`, `user_id` FROM `User` WHERE STRCMP(`username`, ?)=0 AND STRCMP(`password`, ?)=0 LIMIT 1";
        $stmt = $mysqli->prepare($loginSQL);
            $this->assertInstanceOf('mysqli_stmt', $stmt);

        $username = "keljoundi";    //valid test data to query
        $hash = "20STUsLKVBN36";

        $bindResult = $stmt->bind_param('ss', $username, $hash);
            $this->assertTrue($bindResult);
        $executeResult = $stmt->execute();
            $this->assertTrue($executeResult);
        $loginResult = $stmt->get_result();
            $this->assertInstanceOf('mysqli_result', $loginResult);
            $this->assertEquals($loginResult->num_rows, 1);
        $userInfo = $loginResult->fetch_assoc();
            $this->assertTrue( is_array($userInfo) );

        $mysqli->close();   //cleanup test
        $stmt->close();
    }

}
