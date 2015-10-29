<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */

try {
    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
    VALUES(?,?,?,?,?)";
    $stmt = $mysqli->prepare($createcompany_postSQL);
    $stmt->bind_param('ssss',
        $_POST['company_id'],
        $_SESSION['user_id'],
        $_POST['post_title'],
        $_POST['pos_content'],
        $_POST['rating']);

    $stmt->execute();
    $stmt->close();
    $mysqli->close();

} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}





?>
