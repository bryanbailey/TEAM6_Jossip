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
    <title>Viewing position post</title>

    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <script src="/vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- General Job Gossip styling -->
    <link rel="stylesheet" href="/resources/css/jgStyle.css">

    <script>
        $(document).ready(function() {

            /* make navbar, sidebar list link display as active for current page */
            $("#navbar a[href=\"/viewPost.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/viewPost.php\"]").addClass("active");

        });
    </script>


</head>

<body>
<?php
include '/resources/php/navbar.php';
?>

<div class = "container">

    <h1 class="page-header">(Position post selected from search results)</h1> <!-- POSITION TITLE SHOULD GO HERE FROM SEARCH PAGE SELECTION -->

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <?php

            echo '
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Company name</b><span class="pull-right">Jossip rating: <b>X.X stars</b></span></div>
                    <div class="panel-body">
                        Company description goes here
                    </div>
                    <div class="panel-heading"><b>Position title</b></div>
                    <div class="panel-body">
                        Position description / comments go here
                    </div>
                    <div class="panel-heading" style="font-size:small"><i>Submitted by (poster user name)</i><span class="pull-right">Jossip rating: <b>X.X stars</b></span></div>

                </div>


<!-- THE FOLLOWING RATING IS FOR THE USER TO RATE THE POST, WHICH IS APPLIED TO THE POSTER -->
                <div class="rating">
                    <span><br><b>Please rate this post</b> as to how helpful it has been to you.<br></span>
                    <span>(1 star = less helpful, 5 stars = very helpful):</span>
                    <input type="radio" id="star5" name="jobrating" value="5" /><label for="star5" title="Very helpful">5 stars</label>
                    <input type="radio" id="star4" name="jobrating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3" name="jobrating" value="3" /><label for="star3" title="Satisfactory">3 stars</label>
                    <input type="radio" id="star2" name="jobrating" value="2" /><label for="star2" title="Not great">2 stars</label>
                    <input type="radio" id="star1" name="jobrating" value="1" /><label for="star1" title="Unsatisfactory">1 star</label>
                </div>
            ';
        ?>
    </div>


</div>


</body>
</html>