<?php
session_start();

?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jossip Home page</title>
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
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <?php
                  include './resources/php/navbar.php';
                  include '/resources/php/sidebarList.php';
              ?>
            </div>

            <!-- /.navbar-collapse -->

        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Jossip
                        </h1>
                          <p>Where <i><span style="color:mediumpurple">jo</span>bs</i> and <i>go<span style="color:mediumpurple">ssip</span></i> meet.</p>
                          <p>Jossip ("jobs" + "gossip") is devoted to spreading the scuttlebutt about employers and positions that you won't find anywhere else!</p>


                    </div>
                    <div>


                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div>Browse Company by rank</div>
                                    </div>
                                </div>
                            </div>
                            <a href="browsecos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                            <a href="createJobPost.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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

                                        <div>Search for speicfic posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="searchPosts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                            <a href="browseJobPosts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                  </div>

                  <section id="services">
                          <div class="container">
                              <div class="row">
                                  <div class="col-lg-12 text-center">
                                      <h2 class="section-heading">Jossip!</h2>
                                      <hr class="primary">
                                  </div>
                              </div>
                          </div>
                          <div class="container">
                              <div class="row">

                                  <div class="col-lg-3 col-md-6 text-center">
                                      <div class="service-box">
                                          <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                                          <h3>Find your Employer</h3>
                                          <p class="text-muted">Get to know all about your future employer!</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 text-center">
                                      <div class="service-box">
                                          <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                                          <h3>Up to Date</h3>
                                          <p class="text-muted">Stay up to date about recent trending companies</p>
                                      </div>
                                  </div>
                  <div class="col-lg-3 col-md-6 text-center">
                   <div class="service-box">
                       <i class="fa fa-4x fa-star wow bounceIn text-primary"></i>
                       <h3>Rate your Employer</h3>
                       <p class="text-muted">Rate about your employer</p>
                   </div>
               </div>
                              </div>
                          </div>
                      </section>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    </body>

</html>
