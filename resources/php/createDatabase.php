<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 4:03 PM
 */

/*
 * This script will do the following:
 *      1. Add a password to the root user
 *      2. Create table `User`
 *
 *
 *      Prerequisites:
 *          XAMPP installed
 *          XAMPP open and Apache and MYSQL servers running
 *
 *      ***IMPORTANT BEFORE YOU RUN THIS CODE***
 *          go to http://localhost/phpmyadmin in a browser
 *          Now from the top navigation bar click on "Users"
 *          Find the first user named "root" and click "edit privelages"
 *          At the top select "Change password" and change it to "eqBZKHCd775HA2fS"
 *          Do this for the other two "root" users. you will get an error after changing the third
 *          Now you need to change one of the phpmyadmin configuration files before you do anything else.
 *          To do this open up the XAMPP control panel.
 *          Find the row that says "Apache" and follow that to the right and select "config"
 *          From the list select "phpMyAdmin (config.inc.php)"
 *          In this file find the line "  $cfg['Servers'][$i]['password'] = '';    "
 *              And change it to: "  $cfg['Servers'][$i]['password'] = 'eqBZKHCd775HA2fS';  "
 *          Then save and close
 *          In XAMPP stop both Apache and MYSQL and then start them again
 *          To run this script place it in your phpStorm project folder then navigate to it with a browser
 *              i.e. http://localhost/Project1/createDatabase.php
 *
 */

    $databaseName = "JobGossip";

    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS");
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    $createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS `".$databaseName."`";
    $mysqli->query($createDatabaseSQL);

    if ($mysqli->select_db($databaseName) === false) {
        echo "No Database found!";
    }else{

        $createUserSQL = "  CREATE TABLE IF NOT EXISTS `user` (
                            `user_id` int(8) NOT NULL AUTO_INCREMENT,
                            `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
                            `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                            `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                            `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                            `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                            `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                            `registration_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            PRIMARY KEY (`user_id`),
                            UNIQUE KEY `index_unique_username` (`username`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
                            ";
        $userResult = $mysqli->query($createUserSQL);
        if($userResult){
            echo "User Table Created!<br />";
        }


        $createCompanyTableSQL = "
                                    CREATE TABLE IF NOT EXISTS `company` (
                                    `company_id` int(8) NOT NULL AUTO_INCREMENT,
                                    `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                                    `company_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
                                    PRIMARY KEY (`company_id`)
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
                                    ";
        $companyResult = $mysqli->query($createCompanyTableSQL);
        if($companyResult){
            echo "Company Table Created!<br />";
        }



        $createPositionTableSQL = "
                                    CREATE TABLE `position` (
                                    `position_id` int(8) NOT NULL AUTO_INCREMENT,
                                    `fk_company_id` int(8) NOT NULL,
                                    `position_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                                    `position_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
                                    PRIMARY KEY (`position_id`),
                                    KEY `fk_company_id` (`fk_company_id`),
                                    CONSTRAINT `position_ibfk_1` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`)
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
                                    ";
        $positionResult = $mysqli->query($createPositionTableSQL);
        if($positionResult){
            echo "Position Table Created!<br />";
        }

        $createCompanyPostTableSQL = "
                                        CREATE TABLE IF NOT EXISTS `company_post` (
                                        `post_id` int(8) NOT NULL AUTO_INCREMENT,
                                        `fk_user_id` int(8) NOT NULL,
                                        `fk_company_id` int(8) NOT NULL,
                                        `post_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                                        `post_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
                                        `company_rating` tinyint(1) NOT NULL,
                                        `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                        PRIMARY KEY (`post_id`),
                                        KEY `fk_user_id` (`fk_user_id`),
                                        KEY `fk_company_id` (`fk_company_id`),
                                        CONSTRAINT `company_post_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
                                        CONSTRAINT `company_post_ibfk_2` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`)
                                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
                                        ";
        $companyPostResult = $mysqli->query($createCompanyPostTableSQL);
        if($companyPostResult){
            echo "Company_Post Table Created!<br />";
        }

        $createPositionPostTableSQL = "  CREATE TABLE IF NOT EXISTS `position_post` (
                                        `post_id` int(8) NOT NULL AUTO_INCREMENT,
                                        `fk_user_id` int(8) NOT NULL,
                                        `fk_position_id` int(8) NOT NULL,
                                        `post_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                                        `post_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
                                        `position_rating` tinyint(1) NOT NULL,
                                        `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                        PRIMARY KEY (`post_id`),
                                        KEY `fk_user_id` (`fk_user_id`),
                                        KEY `fk_position_id` (`fk_position_id`),
                                        CONSTRAINT `position_post_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
                                        CONSTRAINT `position_post_ibfk_2` FOREIGN KEY (`fk_position_id`) REFERENCES `position` (`position_id`)
                                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
                                        ";
        $positionPostResponse = $mysqli->query($createPositionPostTableSQL);
        if($positionPostResponse){
            echo "Position_Post Table Created!";
        }


    }

    $mysqli->close();
    exit();

?>