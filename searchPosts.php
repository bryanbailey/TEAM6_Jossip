<?php
session_start();
$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip search page</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <script src="/vendors/jquery-2.1.4.min.js"></script>
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
    <style type="text/css">
                .container> .alert{
            position: absolute;
            left: 30%;
            right: 30%;
            margin: 10px auto;
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function() {
            /* make navbar, sidebar list link display as active for current page */
            $("#sidebarList a[href=\"/searchPosts.php\"]").addClass("active");
            $("#submitButton").click(function(e){
                if( $("#company_name").val() == "" && $("#user_id").val() == "" && $("#post_position").val() == "" ){
                    e.preventDefault();
                    e.stopPropagation();
                    $("#company_name").parent(".form-group").addClass("has-error");
                    $("#user_id").parent(".form-group").addClass("has-error");
                    $("#post_position").parent(".form-group").addClass("has-error");

                }
                if( $("#company_name").val() != "" && $("#user_id").val() != "" && $("#post_position").val() != "" )
                {
                  e.preventDefault();
                  e.stopPropagation();
                  alert("Select any one");

                }
            });

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

    </div>
    <div class = "col-sm-9" style="padding-bottom:150px;">
        <div class="form-group">
            <h1 class="page-header">Search Jossip posts</h1>
            <h4>You may search by one of the following criteria: </h4>
            <form class="form-signin" method="POST" action="/searchresultscript.php">
                      <label for="post_position">Job title: </label>
            <input type="text" name="Position_Name" id="post_position" class="form-control" placeholder="Position name" autofocus="autofocus" />
        </div>
        <div class="form-group">
            <label for="company_name">Company name: </label>
            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company name" autofocus="autofocus" />
        </div>
        <div class="form-group">
            <label for="user_id">Jossip poster: </label>
              <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Poster" autofocus="autofocus" />
        </div>
        <div class="form-group">
            <span class="pull-right"><button type="submit" class="form-control btn btn-primary btn-block"  id="submitButton"></span>
            Search
            </button>
         </div>
    </div>
</div>
</div>
</body>
</html>
