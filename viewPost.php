<?php
session_start();

    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $postListSQL = "  SELECT `p`.`position_title`,`p`.`post_content`,`c`.`company_name`,`u`.`first_name`
                FROM `position_post` `p`,`company` `c`,`user` `u`
                WHERE `p`.`fk_company_id`=`c`.`company_id` AND `p`.`fk_user_id` = `u`.`user_id`
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
                    <div class="panel-heading">Company Name : <b>',$post['company_name'],'</b></div>

                    <div class="panel-body"><b>Position Title : </b>',$post['position_title'],'</b></span>

                        <div class="panel-body"><b>Nature of work invlolved:</b>
                             ',$post['post_content'],'</span>
                        </div>
                    <div class="panel-heading" style="font-size:small"><i></b>(Poster: <b>',$post['first_name'],')</b>
<span class ="pull-right"> Please rate the Post  <div class="rating">

      <input type="radio" id="star5" name="jobrating" value="5" /><label for="star5" title="Best">5 stars</label>
      <input type="radio" id="star4" name="jobrating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
      <input type="radio" id="star3" name="jobrating" value="3" /><label for="star3" title="Satisfactory">3 stars</label>
      <input type="radio" id="star2" name="jobrating" value="2" /><label for="star2" title="Not great">2 stars</label>
      <input type="radio" id="star1" name="jobrating" value="1" /><label for="star1" title="Unsatisfactory">1 star</label>
      </div>
  </span>
                    </div>
                    </div>
             ';
        }

        ?>
    </div>


</div>


</body>
</html>
