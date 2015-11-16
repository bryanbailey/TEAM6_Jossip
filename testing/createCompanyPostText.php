<?php

/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/16/2015
 * Time: 9:11 AM
 */

require_once 'PHPUnit/Autoload.php';

class createCompanyPostText extends PHPUnit_Framework_TestCase
{
    public function testMysqliConnection(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $connection = $mysqliConn->ping();
        $this->assertTrue($connection);
        $mysqliConn->close(); //cleanup test
    }

    public function testStatement(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
                              VALUES(?,?,?,?,?)";

        $stmt = $mysqliConn->prepare($createcompany_postSQL);
        $this->assertInstanceOf('mysqli_stmt', $stmt);

        $stmt->close();
        $mysqliConn->close();
    }

    public function testBindStatement(){
        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
                              VALUES(?,?,?,?,?)";
        /* valid test data to insert in DB */
        $co = "2";
        $user = "2";
        $title = "Post title";
        $con = "description...";
        $rate = 5;

        $stmt = $mysqliConn->prepare($createcompany_postSQL);
        $result = $stmt->bind_param('sssss', $co, $user, $title, $con, $rate );

        $this->assertTrue($result);
        $stmt->close();
        $mysqliConn->close();
    }

    public function testInsert(){

        $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
                              VALUES(?,?,?,?,?)";
        /* valid test data to insert in DB */
        $co = "2";
        $user = "2";
        $title = "Post title";
        $con = "description...";
        $rate = 5;

        $stmt = $mysqliConn->prepare($createcompany_postSQL);
        $stmt->bind_param('sssss', $co, $user, $title, $con, $rate );
        $result = $stmt->execute();

        /* assertions */
        $this->assertTrue($result);
        $this->assertEquals($stmt->affected_rows, 1);

        $stmt->close(); //clean up test
        $mysqliConn->close();

    }


}
