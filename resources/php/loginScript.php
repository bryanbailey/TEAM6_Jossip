<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 5:32 PM
 */


    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }


    $username = $_POST['username'];
    $password = $_POST['password'];

    //get salt
    $saltSQL = "SELECT `salt` FROM `User` WHERE STRCMP(`username`, ?)=0 LIMIT 1";
    $stmt = $mysqli->prepare($saltSQL);
    $stmt->bind_param('s',$username);
    $b = $stmt->execute();
    $saltResults = $stmt->get_result();
    $stmt->close();

    $saltRow = $saltResults->fetch_array(MYSQLI_NUM);
    $salt = $saltRow[0];

    //generate hash
    $hash = crypt($password, $salt);

    //sql to check login
    $loginSQL = "SELECT `first_name`, `user_id` FROM `User` WHERE STRCMP(`username`, ?)=0 AND STRCMP(`password`, ?)=0 LIMIT 1";
    $stmt2 = $mysqli->prepare($loginSQL);
    $stmt2->bind_param('ss', $username, $hash);
    $c = $stmt2->execute();
    $loginResult = $stmt2->get_result();
    $userInfo = $loginResult->fetch_assoc();


    //login successfull
    if( $loginResult->num_rows == 1 ){

        session_start();                    //call at very begining of all pages
        $_SESSION['JobGossipLogin']= "1";   //check this session varible for login
        $_SESSION['user'] = $username;      //session variable holds username
        $_SESSION['user_id'] = $userInfo['user_id'];
        $stmt2->close();

        header("Location: /loginlanding.php");    //route back to home

    }else{
        header("Location: /login.php?retry=1");    //route back to login page
    }


?>