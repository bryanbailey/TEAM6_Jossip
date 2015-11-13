<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/13/2015
 * Time: 10:52 AM
 */

session_start();


try {
    $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $jobPostSQL = "INSERT INTO `Position_Post`(`fk_user_id`,`fk_company_id`, `position_title`, `post_content`)
                              VALUES(?,?,?,?)";

    $stmt = $mysqliConn->prepare($jobPostSQL);
    $stmt->bind_param('ssss',
        $_SESSION['user_id'],
        $_POST['company'],
        $_POST['position'],
        $_POST['content'] );
    $result = $stmt->execute();
    $stmt->close();
    $mysqliConn->close();
    echo $result;

} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}




?>