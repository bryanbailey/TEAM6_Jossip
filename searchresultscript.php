<?php
session_start();
  $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    if (isset($_POST['company_name']) && ($_POST['company_name']!="")) {
      $company_name = $_POST['company_name'];
      $companylist = "  SELECT DISTINCT company_post.post_title,company_post.post_content ,post_id,company_name,post_id,company_description ,company_post.fk_company_id,
      (SELECT user.first_name FROM user WHERE user.user_id=company_post.fk_user_id) as 'first_name'
      FROM company,company_post WHERE company_post.fk_company_id
      in(SELECT company_id FROM company WHERE company_name like '%$company_name%' ) and company_name like '%$company_name%'
                    ";
      $CPQuery = $mysqli->query($companylist);
    }
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


    <h1 class="page-header">Jossip Post</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <?php

  while($post = $CPQuery->fetch_assoc() )
            echo '
                <div class="panel panel-default">
              <a href="viewPost.php?compna=',$post['post_id'],'" > <div class="panel-heading"><h3><b>',$post['company_name'],'</b></h3></div> </a>
                        <div class="panel-body">About: <b>',$post['company_description'],'</b></span>
                            <div class="panel-body"><b>Comments:</b>
                             ',$post['post_content'],'</span>
                            </div>
                        <div class="panel-heading" style="font-size:small"><i></b>Poster: <b>',$post['first_name'],'</i></b>
                    </div>
                </div>
    </div>

    ';
    ?>

    </div>


</div>


</body>
</html>
