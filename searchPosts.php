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
    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- General Job Gossip styling -->
    <link rel="stylesheet" href="/resources/css/jgStyle.css">
    <!-- browsecos css styling -->
    <link rel="stylesheet" href="/resources/css/browsecos.css">
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
<?php
include '/resources/php/navbar.php';
?>

<div class = "container.searchpost">

    <h1 class="page-header">Search Jossip posts</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <div class="form-group">
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
</body>
</html>
