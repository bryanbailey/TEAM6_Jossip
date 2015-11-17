<?php





function insertCompany($mysqli, $companyID, $userID, $postTitle, $postContent, $rating){
    $result = false;
    try {
        $createcompany_postSQL = "INSERT INTO `company_post`(`fk_company_id`,`fk_user_id`,`post_title`,`post_content`,`company_rating`)
                              VALUES(?,?,?,?,?)";
        $stmt = $mysqli->prepare($createcompany_postSQL);
        $stmt->bind_param('sssss', $companyID, $userID, $postTitle, $postContent, $rating);
        $result = $stmt->execute();
        $stmt->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    return $result;
}











?>

