<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 5:24 PM
 */

    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $salt = uniqid(mt_rand(), true);
        $hash = crypt($_POST['password'], $salt);

        $createUserSQL = "INSERT INTO `User` (`username`,`first_name`,`last_name`,`email`,`salt`,`password`)
                                    VALUES(?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($createUserSQL);
        $stmt->bind_param('ssssss',
            $_POST['username'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $salt,
            $hash );
        $stmt->execute();
        $stmt->close();

        $mysqli->close();

        //header("Location: ./index.php");

    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }





?>