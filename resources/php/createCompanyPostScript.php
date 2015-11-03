<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */


try {
    $mysqliConn = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
                              VALUES(?,?,?,?,?)";

    $stmt = $mysqliConn->prepare($createcompany_postSQL);
    $stmt->bind_param('sssss',
        $_POST['companyID'],
        $_SESSION['user_id'],
        $_POST['post_title'],
        $_POST['pos_content'],
        $_POST['jobrating'] );
    $stmt->execute();
    $stmt->close();
    $mysqliConn->close();

} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}





?>
