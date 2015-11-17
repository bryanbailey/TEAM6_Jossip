<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/16/2015
 * Time: 10:24 PM
 */


function postPosition($mysqli, $userID, $companyID, $position, $content){

    try {
        $jobPostSQL = "INSERT INTO `Position_Post`(`fk_user_id`,`fk_company_id`, `position_title`, `post_content`)
                              VALUES(?,?,?,?)";
        $stmt = $mysqli->prepare($jobPostSQL);
        $stmt->bind_param('ssss', $userID, $companyID, $position, $content );
        $result = $stmt->execute();
        $stmt->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    return $result;
}


?>