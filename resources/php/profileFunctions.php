<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/22/2015
 * Time: 1:26 PM
 */

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

/*
 * If "action" post variable was set then the function was called via ajax (javascript)
 * the action variable specifies which php function to run to insert/remove/update database entries
 */
if( isset($_POST['action']) ){
    switch($_POST['action']){
        case 'addEmploymentHistory':
            $result = addEmploymentHistory($_SESSION['user_id'], $_POST['companyID'], $_POST['startDate'], $_POST['endDate']);
            echo $result;
            break;
        case 'updateUserInfo':
            $result = updateUserInfo($_SESSION['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
            break;
    }
}

function updateUserInfo($userID, $firstName, $lastName, $email){
    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $userSQL = "UPDATE `user` SET `first_name`=?, `last_name`=?, `email`=? WHERE `user_id`=? LIMIT 1";
        $stmt = $mysqli->prepare($userSQL);
        $stmt->bind_param('ssss', $firstName, $lastName, $email, $userID);
        $result = $stmt->execute();

        $stmt->close();
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
    return $result;
}


function getUserInfo($userID){
    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $userSQL = "SELECT `first_name`,`last_name`,`email` FROM `User` WHERE `user_id` = ? LIMIT 1";
        $stmt = $mysqli->prepare($userSQL);
        $stmt->bind_param('s', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
    return $result;
}


/*
 * returns employment history of user
 */
function getCompanyHistory($userID){
    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $historySQL = "SELECT `company_name`, `start_date`, `end_date`
                        FROM `employment_history`
                        LEFT JOIN `company`
                        ON `company`.`company_id` = `employment_history`.`fk_company_id`
                        WHERE `fk_user_id` = ?";
        $stmt = $mysqli->prepare($historySQL);
        $stmt->bind_param('s', $userID );
        $stmt->execute();

        $historyResults = $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    return $historyResults;
}

function addEmploymentHistory($userID, $companyID, $startDate, $endDate){
    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $addHistorySQL = "INSERT INTO `employment_history` (`fk_user_id`, `fk_company_id`, `start_date`, `end_date`)
                                                      VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($addHistorySQL);
        $stmt->bind_param('ssss', $userID, $companyID, $startDate, $endDate);
        $result = $stmt->execute();

        $stmt->close();
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
    return $result;
}


/*
 * returns mysqli result containing company list
 */
function getCompanyList($mysqli){
    try {
        $companySQL = "SELECT `company_id` as 'value', `company_name` as 'label' FROM `company` WHERE 1";
        $stmt = $mysqli->prepare($companySQL);
        $stmt->execute();
        $companyResults = $stmt->get_result();

        $stmt->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    return $companyResults;
}

/*
 * returns total posts made by user
 */
function getPostCount($mysqli, $userID){
    $positionPQuery = $mysqli->query("SELECT COUNT(`post_id`) as 'count' FROM `position_post` WHERE `fk_user_id` = ".$userID);
    $companyPQuery = $mysqli->query("SELECT COUNT(`post_id`) as 'count' FROM `company_post` WHERE `fk_user_id` = ".$userID);

    $ppCount = $positionPQuery->fetch_assoc()["count"];
    $cpCount = $companyPQuery->fetch_assoc()["count"];

    return (intval($ppCount) + intval($cpCount));

}




?>