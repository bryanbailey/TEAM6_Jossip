<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 5:32 PM
 */

require $_SERVER['DOCUMENT_ROOT'].'/resources/php/generalFunctions.php';

//post variables from login.php
$username = $_POST['username'];
$password = $_POST['password'];

$mysqli = createDBConnection();//create DB connection
$salt = retrieveSalt($username);//retrieve salt (used to generate hash)
$hash = retrieveHash($password, $salt);//generate hash (stored password)
$loginRecord = loginRecord($username, $hash);//check db for user record
login($loginRecord);//login

    /*
     * test for successful login and route to page
     */
    function login($loginResult){
        //retrieve number of rows from result to determine if record was found
        $loginSuccess = ($loginResult->num_rows == 1) ? true : false;
        //retrieve data from result set
        $userInfo = $loginResult->fetch_assoc();

        //login successfull
        if ($loginSuccess) {

            session_start();                    //call at very begining of all pages
            $_SESSION['JobGossipLogin'] = "1";   //check this session varible for login
            $_SESSION['user'] = $userInfo['username'];      //session variable holds username
            $_SESSION['user_id'] = $userInfo['user_id'];

            header("Location: /loginlanding.php");    //route back to home

        } else {
            header("Location: /login.php?retry=1");    //route back to login page

        }
    }

    /*
     * get salt of user
     */
    function retrieveSalt($username){

         /* use "global" to use a variable declared outside the function without
            having to pass in as parameter  */
        global $mysqli;

        /* normal prepared statement creation and execution */
        $saltSQL = "SELECT `salt` FROM `User` WHERE STRCMP(`username`, ?)=0 LIMIT 1";
        $stmt = $mysqli->prepare($saltSQL);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $saltResults = $stmt->get_result();
        $stmt->close();

        //get value from result set
        $saltRow = $saltResults->fetch_array(MYSQLI_ASSOC);
        return $saltRow["salt"];
    }

    /*
     * create password hash
     */
    function retrieveHash($password, $salt){
        return crypt($password, $salt);
    }

    /*
     * returns mysqli result set
     */
    function loginRecord($username, $hash){
        global $mysqli;
        //sql to check login
        $loginSQL = "SELECT `first_name`, `user_id`, `username` FROM `User` WHERE STRCMP(`username`, ?)=0 AND STRCMP(`password`, ?)=0 LIMIT 1";
        $stmt = $mysqli->prepare($loginSQL);
        $stmt->bind_param('ss', $username, $hash);
        $stmt->execute();
        return $stmt->get_result();
    }


?>
