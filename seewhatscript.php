<?php
require '/resources/php/profileFunctions.php';



  $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    if (isset($_GET['company_name']) && ($_GET['company_name']!="")) {
      $company_name = $_GET['company_name'];
      $companylist = "   SELECT DISTINCT position_post.position_title as post_title ,position_post.post_id,position_post.post_content,company_name,position_post.post_id,company_description ,position_post.fk_company_id,
      (SELECT user.username FROM user WHERE user.user_id=position_post.fk_user_id) as 'first_name'
      FROM company,company_post,position_post WHERE position_post.fk_company_id
      in(SELECT company_id FROM company WHERE company_name like '%$company_name%' ) and company_name like '%$company_name%'
                    ";
      $CPQuery = $mysqli->query($companylist);
    }
if (isset($_GET['Position_Name']) && ($_GET['Position_Name']!="")){

  $position_name = $_GET['Position_Name'];

  $positionlist = "  SELECT DISTINCT position_post.post_content,position_post.position_title as 'post_title',position_post.post_id,company.company_name,(SELECT user.username  FROM user WHERE user.user_id=position_post.fk_user_id) as 'first_name' , company.company_description
                    FROM position_post,company,company_post
                    WHERE position_post.position_title LIKE '%$position_name%' AND company.company_id=position_post.fk_company_id
                ";
  $CPQuery = $mysqli->query($positionlist);
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


    <h1 class="page-header">Jossip post</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <?php
if ($CPQuery->num_rows>0){

  while($post = $CPQuery->fetch_assoc() )
            echo '
                <div class="panel panel-default">
              <a href="viewPost.php?compna=',$post['post_id'],'" > <div class="panel-heading"><h3><b>',$post['company_name'],'</b></h3></div> </a>
                        <div class="panel-body">Position : ',$post['post_title'],'
                            <div class="panel-body"><b>Comments:</b>
                             ',$post['post_content'],'</span>
                            </div>
                        <div class="panel-heading" style="font-size:small"><i></b>Poster: <b>',$post['first_name'],'</i></b>
                    </div>
                </div>
    </div>

    ';
} else {
  echo "No Results were found";
}
    ?>

    </div>


</div>


</body>
</html>
