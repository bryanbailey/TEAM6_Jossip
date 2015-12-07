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
    <title>Jossip browse posts page</title>

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
            $("#navbar a[href=\"/browseJobPosts.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/browseJobPosts.php\"]").addClass("active");

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
      <h1 class="page-header">Jossip rated positions</h1>
      <div class="pull-left">Position posts in <b>Jossip</b> are written by registered Jossip users who have actually
      held those positions.</div>
        <?php
        while( $post = $postListSQLQuery->fetch_assoc() ) {
            echo '
            <div class="well company-well">
                <h3><b>', $post['position_title'], '</b>
                <div class="pull-right" style="font-size: small">Company: <b>', $post['company_name'], '</b></div></h3>
                <p><b>Comments: </b>', $post['post_content'], '</b></p>
            ';

            echo '
                 <div class="text-right"><a href="seewhatscript.php?Position_Name=',$post['position_title'],'">See the whole ', $post['position_title'], ' post and its rating.</a></div>
            </div>
            ';
        }
        ?>

    </div>

</div>
</div>
</body>
</html>
