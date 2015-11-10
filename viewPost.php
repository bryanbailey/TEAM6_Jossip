<?php

session_start();

$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
$postListSQL = "  SELECT `po`.`position_title`,`po`.`position_description`,`c`.`company_name`,`p`.`post_title`,`p`.`post_content`,IFNULL(`p`.`position_rating`, '-') AS 'rating'
                    FROM `company` c,`position_post` p,`position` po
                    WHERE `c`.`company_id`=`po`.`fk_company_id` AND `po`.`position_id`=`p`.`fk_position_id`
                      ";
$postListSQLQuery = $mysqli->query($postListSQL);
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

    <h1 class="page-header">(Post results from existing posters)</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <?php

        while( $post = $postListSQLQuery->fetch_assoc() ){
            echo '
                               <div class="panel panel-default">
                                   <div class="panel-heading">Comapny Name : <b>',$post['company_name'],'</b><span class="pull-right">Position Title : <b>',$post['position_title'],'</b></span></div>

                                   <div class="panel-body"><b>Nature of work invlolved:</b>
                                       ',$post['position_description'],'<span class="pull-right">Jossip rating: <b>',$post['rating'],' stars</b></span>
                                   </div>
                                   <div class="panel-body"><b>About the work:</b>
                                       ',$post['post_content'],'
                                   </div>

                               </div>
                           ';
        }
        ?>
    </div>


</div>


</body>
</html>
