
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip login landing page</title>

    <link rel="stylesheet" type="text/css" href="./resources/css/jossstyle.css" />
    <!-- jquery 2.1.4 -->
    <script src="./vendors/jquery-2.1.4.min.js"></script>

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

</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
    <?php
        session_start();
        include './resources/php/navbar.php';
        include '/resources/php/sidebarList.php';
    ?>
  </div>
  </nav>
  <div id="page-wrapper">
  <div class="container-fluid">



    <div class="col-sm-3">

    </div>

    <div id = "main" style="padding-bottom:320px;">
      <h1 class="page-header">Welcome to Jossip!</h1>
        <h3>You've successfully logged in to Jossip!</h3>
        <p>Would you like to:</p>
        <ol>
            <li><a href="/profile.php">Change your account details?</a></li>
            <li><a href="/createJobPost.php">Post and rate a position/company?</a></li>
        </ol>

    </div>

    <div id = "login">

    </div>
</div>
</div>
</body>
</html>
