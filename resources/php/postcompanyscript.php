<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */

try {
    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`,`post_time`)
    VALUES(?,'1',?,?,?,now())";
    $stmt = $mysqli->prepare($createcompany_postSQL);
    $stmt->bind_param('ssss',
        $_POST['cname'],
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
