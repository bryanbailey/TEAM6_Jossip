<?php

    session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Jossip home page</title>
    <!-- This is the "Landing page" for the website, which will serve as the first page people see and the introduction to the product.
        All the pages are broken up into roughly the same divisions, and the "header" and "nav" ones will rarely change except to change
        the navigation within the site. -->

    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- general Joossip styling -->
    <link rel="stylesheet" type="text/css" href="/resources/css/jgStyle.css" />
<!--    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" /> -->
    <link href="./resources/startbootstrap-sb-admin-1.0.4/css/sb-admin.css" rel="stylesheet">
<link href="./resources/startbootstrap-sb-admin-1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script>
        $(document).ready(function() {

            /* make navbar, sidebar list link display as active for current page */
            $("#navbar a[href=\"/index.php\"]").parent("li").addClass("active");

        });
    </script>

</head>

<body>

<?php
    include './resources/php/navbar.php';
?>

<div class = "container">
     <div>
        <h1 class="page-header" style="color:red"><i><b>Jossip!</b></i></h1>
        <p>Where <i><span style="color:mediumpurple">jo</span>bs</i> and <i>go<span style="color:mediumpurple">ssip</span></i> meet.</p><br>
    </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bars fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div>Browse companies<br>by rank</div>
                                    </div>
                                </div>
                            </div>
                            <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/browsecos.php"' : 'href="/login.php"'); ?> >
                                <div class="panel-footer">
                                    <span class="pull-left">View details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div>Post position</div>
                                    </div>
                                </div>
                            </div>
                            <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/createJobPost.php"' : 'href="/login.php"'); ?> >
                                <div class="panel-footer">
                                    <span class="pull-left">View details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-search fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div>Search for specific posts</div>
                                    </div>
                                </div>
                            </div>
                            <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/searchPosts.php"' : 'href="/login.php"'); ?> >
                                <div class="panel-footer">
                                    <span class="pull-left">View details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div>Browse position posts</div>
                                    </div>
                                </div>
                            </div>
                            <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/browseJobPosts.php"' : 'href="/login.php"'); ?> >
                                <div class="panel-footer">
                                    <span class="pull-left">View details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                  </div>

    <div class="col-sm-3">
        <div class="list-group">

        <?php
        if( !isset( $_SESSION['JobGossipLogin'] ) ) {
            echo "<a class=\"list-group-item\" href=\"/login.php\">Login</a>";
            echo "<a class=\"list-group-item\" href=\"/register.php\">New user? Create an account</a>";
        }else {
            echo "<a class=\"list-group-item\" href=\"/profile.php\">View your profile information</a>";
        }
        ?>

        </div>

    </div>

    <!-- The "main" is where the majority of the php is going to take place, so look here on each page if you are looking for placement -bb -->

    <div class="col-sm-offset col-sm-8">
        <h3>Welcome to Jossip</h3>
        <p>Jossip ("jobs" + "gossip") is devoted to spreading the scuttlebutt about employers and positions that you won't find anywhere else!</p>
        <?php
            if( !isset( $_SESSION['JobGossipLogin'] ) ) {
                echo "<p>To take full advantage of Jossip's features, create an <a href=\"./register.php\"><b>account</b></a> so that you can access rated info on employers and positions.</p>";
                echo "<p>As a casual site visitor, you can browse a list of companies rated by Jossip users <a href=\"./browsecos.php\"><b>here</b></a>.</p>";
            }
        ?>

    </div>

</div>


</body>
</html>