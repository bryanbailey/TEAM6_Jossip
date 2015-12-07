<?php

    session_start();

    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

    /*
     * pull rating from employment history, not company_post
     */
    $companyListSQL = " SELECT `company_id`, `company_name`,`company_description`, `rating`
                        FROM (
                          SELECT `company_id`, `company_name`,`company_description`, TRUNCATE(AVG(`company_rating`),1) AS 'rating'
                          FROM `company`
                            LEFT JOIN `Employment_History` ON `Company`.`company_id` = `Employment_history`.`fk_company_id`
                          WHERE 1
                          GROUP BY `company_id`
                          ORDER BY `rating` DESC
                        ) a
                        WHERE `rating` IS NOT NULL
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

        <!-- Bootstrap Core CSS -->
        <link href="./resources/startbootstrap-sb-admin-1.0.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="./resources/startbootstrap-sb-admin-1.0.4/css/sb-admin.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="./resources/startbootstrap-sb-admin-1.0.4/css/plugins/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="./resources/startbootstrap-sb-admin-1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="./resources/startbootstrap-sb-admin-1.0.4/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./resources/startbootstrap-sb-admin-1.0.4/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {

                /* make navbar, sidebar list link display as active for current page */
                $("#navbar a[href=\"/browsecos.php\"]").parent("li").addClass("active");
                $("#sidebarList a[href=\"/browsecos.php\"]").addClass("active");

            });
        </script>


    </head>

    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <?php
            include './resources/php/navbar.php';
            include '/resources/php/sidebarList.php';
        ?>
      </div>
    </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="col-sm-3">
                <br>

            </div>
            <div class = "col-sm-9">
              <h1 class="page-header">Top-ranked trending companies</h1>
              <div class="pull-left">Ratings of <b>1 to 5 stars</b> are assigned to the companies by individuals who have been employed by those firms.</div>
                <?php
                    while( $company = $companyListQuery->fetch_assoc() ){
                        $rating = floatval($company["rating"]);
                        echo '
                            <div class="well company-well">
                                <h3>
                                    <b>',$company['company_name'],'</b>
                                    <div class="pull-right">';

                                    //print star rating in glyphicons
                                    for( $i=1; $i<=$rating; $i++ ){
                                        echo '<span class="glyphicon glyphicon-star"></span>';
                                    }

                                    //if decimal of rating avg is within .25-.75 print a half star
                                    if( fmod($rating,1.0) >= 0.25 && fmod($rating,1.0) <= 0.75 ){
                                        echo '<span class="glyphicon glyphicon-star glyphicon-star-half"></span>';
                                    }


                        echo '    </div>
                                </h3>
                                <div class="text-right"><a href="seewhatscript.php?company_name=',$company['company_name'],'">See what people are saying about positions at ',$company['company_name'],'</a></div>
                            </div>
                        ';
                    }
                ?>

                <!-- end of list message -->
                <div class="well text-center text-muted">
                    <h3>Want to see more? So do we! Rate your employers!</h3>
                </div>

            </div>
</div>
        </div>

    </body>
</html>
