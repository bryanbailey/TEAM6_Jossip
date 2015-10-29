<?php

    session_start();

    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

    $companyListSQL = "  SELECT `company_id`, `company_name`,`company_description`, IFNULL(TRUNCATE(AVG(`company_rating`),1), '-') AS 'rating'
                        FROM `company`
                            LEFT JOIN `Company_Post` ON `Company`.`company_id` = `Company_Post`.`fk_company_id`
                        WHERE 1
                        GROUP BY `company_id`
                        ORDER BY `rating` DESC
                        ";
    $companyListQuery = $mysqli->query($companyListSQL);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Jossip company rankings page</title>

        <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
        <script src="/vendors/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
        <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/resources/css/jgStyle.css">

        <!-- General Job Gossip styling -->


    </head>

    <body>
        <?php
            include '/resources/php/navbar.php';
        ?>

        <div class = "container">

            <div class="col-sm-3">
                <div class="list-group">
                    <?php
                    if( !isset( $_SESSION['JobGossipLogin'] ) ) {
                        echo "<a class=\"list-group-item\" href=\"/login.php\">Login</a>";
                    }
                    ?>
                    <a class="list-group-item" href="/register.php">New user? Create an account by clicking here</a>
                    <a class="list-group-item" href="/browsecos.php">Browse company rankings</a>
                </div>
            </div>

            <div class = "col-sm-9">
                <h3>Top-ranked trending companies</h3>
                <?php

                    while( $company = $companyListQuery->fetch_assoc() ){
                        echo '
                            <div class="panel panel-default">
                                <div class="panel-heading">',$company['company_name'],'<span class="pull-right">',$company['rating'],'</span></div>
                                <div class="panel-body">
                                    ',$company['company_description'],'
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>


        </div>


    </body>
</html>
