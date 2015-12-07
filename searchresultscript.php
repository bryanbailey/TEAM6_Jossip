<?php
require '/resources/php/profileFunctions.php';


  $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    if (isset($_POST['company_name']) && ($_POST['company_name']!="")) {
      $company_name = $_POST['company_name'];
      $companylist = "   SELECT DISTINCT position_post.position_title as post_title ,position_post.post_id,position_post.post_content,company_name,position_post.post_id,company_description ,position_post.fk_company_id,
      (SELECT user.username FROM user WHERE user.user_id=position_post.fk_user_id) as 'first_name'
      FROM company,company_post,position_post WHERE position_post.fk_company_id
      in(SELECT company_id FROM company WHERE company_name like '%$company_name%' ) and company_name like '%$company_name%'
                    ";
      $CPQuery = $mysqli->query($companylist);
    }
if (isset($_POST['Position_Name']) && ($_POST['Position_Name']!="")){

  $position_name = $_POST['Position_Name'];
  $positionlist = "  SELECT DISTINCT position_post.post_content,position_post.position_title as 'post_title',position_post.post_id,company.company_name,(SELECT user.username FROM user WHERE user.user_id=position_post.fk_user_id) as 'first_name' , company.company_description
                    FROM position_post,company,company_post
                    WHERE position_post.position_title LIKE '%$position_name%' AND company.company_id=position_post.fk_company_id
                ";
  $CPQuery = $mysqli->query($positionlist);
}
if (isset($_POST['user_id']) && ($_POST['user_id']!="")){

  $User_post = $_POST['user_id'];

  $postslist = "      SELECT DISTINCT position_post.post_content,position_post.position_title as 'post_title',position_post.post_id, username
                      FROM position_post,company,company_post,user
                      WHERE username like '%$User_post%' AND position_post.fk_user_id=user_id
                ";
  $CPQuery = $mysqli->query($postslist);



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Viewing position post</title>
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
            $("#navbar a[href=\"/viewPost.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/viewPost.php\"]").addClass("active");




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
<div class = "container-fluid">




    <div class="col-sm-3">


    </div>

    <div class = "col-sm-9" style="padding-bottom:180px;">
        <h1 class="page-header">Jossip Post</h1>
        <?php
if ((isset($_POST['user_id']) && ($_POST['user_id']=="")) && ($CPQuery->num_rows>0)){

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
}
elseif((isset($_POST['user_id']) && ($_POST['user_id']!="")) && ($CPQuery->num_rows<1)) {
echo '  <div class="panel panel-default">
<div class="panel-heading"><h3>No results were found!</b></h3></div> </a>
</div>
</div>'
;
}
if ((isset($_POST['user_id']) && ($_POST['user_id']!="")) && ($CPQuery->num_rows>0)){
while($post = $CPQuery->fetch_assoc() )
          echo '
              <div class="panel panel-default">
            <a href="viewPost.php?compna=',$post['post_id'],'" > <div class="panel-heading"><h3><b>',$post['post_title'],'</b></h3></div> </a>
                      <div class="panel-body">
                          <div class="panel-body"><b>Comments:</b>
                           ',$post['post_content'],'</span>
                          </div>
                      <div class="panel-heading" style="font-size:small"><i></b>Poster: <b>',$post['username'],'</i></b> <span class="pull-right"> Position : ',$post['post_title'],' </span>
                  </div>
              </div>
  </div>

  ';
}
elseif((isset($_POST['user_id']) && ($_POST['user_id']=="")) && ($CPQuery->num_rows<1)){
  echo '
      <div class="panel panel-default">
  <div class="panel-heading"><h3>No results were found!</b></h3></div> </a>
  </div>
</div>

';
}
    ?>

    </div>
</div>
</div>


</body>
</html>
