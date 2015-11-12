<!-- I just copied the createCompanyPost page for the sake of making this page - this should be the landing
page for the "Yes" answer in the modal box on that page; this page is for a user who has an existing post with a company
and should select the company from a drowpdown list (marked below) and fill in the position information the same as in
the createCompanyPost page. -->


<?php

session_start();

if( isset($_POST['post_company'])) {
    require '/resources/php/createCompanyPostScript.php';

}
try {
    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $companyListSQL = " SELECT `company_id`, `company_name`
                        FROM `Company`
                            LEFT JOIN `Employment_History`
                            ON `Company`.`company_id` = `Employment_History`.`fk_company_id`
                        WHERE `fk_user_id` = ".$_SESSION['user_id'];
    $companyListQuery = $mysqli->query($companyListSQL);
    $companyListCount = $companyListQuery->num_rows;
    $mysqli->close();
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Create additional company post</title>
    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>
    <!-- jQueryUI 1.11.4 JS, CSS -->
    <script src="/vendors/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/vendors/jquery-ui-1.11.4/jquery-ui.min.css">
    <!-- Bootstrap 3.3.5 core JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- General Job Gossip styling -->
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <link rel="stylesheet" href="/resources/css/jgStyle.css">

    <style type="text/css">
        .companyName { /* displaying co name in questions */
            text-decoration: underline;
            font-style: italic;
        }
    </style>

</head>
<body>
<?php
include '/resources/php/navbar.php';

if( isset($_POST['post_company']) ){
    if( !isset($_POST['post_title']) || $_POST['post_title'] == ""  ){
        echo '<div class="alert alert-warning text-center">Post title Missing!</div>';
    }
}
?>

<div class="container">

    <h1 class="page-header">New position post &nbsp; <small>Review a current or former position with existing company</small></h1>

    <div class="panel-body">
        <div class="col-sm-6 col-sm-offset-3">

            <div class="form-group">
                <label for="post_title">Company</label><br>
                <select id="autoC" class="form-control" <?php echo ($companyListCount<1) ? ' disabled="disabled" ':''; ?> >
                    <?php
                        while( $company = $companyListQuery->fetch_assoc() ){
                            echo '<option value="',$company['company_id'],'">',$company['company_name'],'</option>';
                        }
                    ?>
                </select>
                <?php
                    if($companyListCount < 1){
                        echo '<div class="alert alert-danger text-center">
                                <strong>No employment history!</strong>
                                <a href="/login.php">Fill out your profile!</a>
                               </div>';
                    }
                ?>

<!--    The preceding should present as a pulldown list of the companies associated with the logged-in user. The rest of the page is the
    new position that user holds and it should be posted to the database in association with that user and the company.
-->
            </div>

            <div class="form-group">
                <label for="post_title">Position / job title</label>
                <input type="text" class="form-control" name="post_title" id="post_title" />
            </div>

            <div class="form-group">
                <label for="pos_content">
                    How did you like working for <span class="companyName">the company</span>?<br />
                    Would you recommend this position at <span class="companyName">the company</span>?<br />
                    What worked well at  <span class="companyName">the company</span>?
                </label>
                <textarea class="form-control" name="pos_content" id="pos_content" rows="5"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary btn-block"  id="post_company" <?php echo ($companyListCount<1) ? ' disabled="disabled" ':''; ?>>
                    Post
                </button>
            </div>

        </div>
    </div>
</div>

</body>
</html>