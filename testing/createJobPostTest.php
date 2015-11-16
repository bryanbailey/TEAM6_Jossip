<?php

/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/16/2015
 * Time: 8:53 AM
 */

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Autoload.php';
class jobPostTest extends PHPUnit_Framework_TestCase
{

    public function testMysqliConnection(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $connection = $mysqliConn->ping();
        $this->assertTrue($connection);
            $mysqliConn->close(); //cleanup test
    }

    public function testStatement(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $jobPostSQL = "INSERT INTO `Position_Post`(`fk_user_id`,`fk_company_id`, `position_title`, `post_content`)
                              VALUES(?,?,?,?)";

        $stmt = $mysqliConn->prepare($jobPostSQL);
        $this->assertInstanceOf('mysqli_stmt', $stmt);

            $stmt->close();
            $mysqliConn->close();
    }

    public function testBindStatement(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $jobPostSQL = "INSERT INTO `Position_Post`(`fk_user_id`,`fk_company_id`, `position_title`, `post_content`)
                              VALUES(?,?,?,?)";
        /* valid test data to insert in DB */
        $user = "2";
        $co = "2";
        $pos = "Position x";
        $con = "description...";

        $stmt = $mysqliConn->prepare($jobPostSQL);
        $result = $stmt->bind_param('ssss', $user, $co, $pos, $con );

        $this->assertTrue($result);
            $stmt->close();
            $mysqliConn->close();
    }

    public function testInsert(){

        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $jobPostSQL = "INSERT INTO `Position_Post`(`fk_user_id`,`fk_company_id`, `position_title`, `post_content`)
                              VALUES(?,?,?,?)";
        /* valid test data to insert in DB */
        $user = "2";
        $co = "2";
        $pos = "Position x";
        $con = "description...";

        $stmt = $mysqliConn->prepare($jobPostSQL);
        $stmt->bind_param('ssss', $user, $co, $pos, $con );
        $result = $stmt->execute();

        /* assertions */
        $this->assertTrue($result);
        $this->assertEquals($stmt->affected_rows, 1);

            $stmt->close(); //clean up test
            $mysqliConn->close();

    }

}
