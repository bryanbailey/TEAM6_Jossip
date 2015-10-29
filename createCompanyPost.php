<?php

    session_start();

    if( isset($_POST['post_company'])) {
        require '/resources/php/createCompanyPostScript.php';

    }

    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        $companyListSQL = "SELECT `company_id` AS 'value', `company_name` AS 'label' FROM `Company` WHERE 1";
        $companyListQuery = $mysqli->query($companyListSQL);
        $companyArray = array();
        while( $row = $companyListQuery->fetch_assoc() ){
            $companyArray[] = $row;
        }
        $companyList = json_encode($companyArray);
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Praveen Kumar G">
    <title>New User Registration</title>
    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>
    <!-- jQueryUI 1.11.4 JS, CSS -->
    <script src="/vendors/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/vendors/jquery-ui-1.11.4/jquery-ui.min.css">
    <!-- Bootstrap 3.3.5 core JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- General Job Gossip styling -->
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <link rel="stylesheet" href="/resources/css/jgStyle.css">

    <style type="text/css">
        ul.ui-autocomplete{
            background-color: lightgray;
        }

        .companyQuestion{
            text-decoration: underline;
            font-style: italic;
        }
    </style>

    <script>
        $(document).ready(function() {

            $("#autoC").autocomplete({
                source: <?php echo $companyList; ?>,
                select:
                    function(event, ui){
                        event.preventDefault();
                        $(this).val(ui.item.label);
                        $("#companyID").val(ui.item.value);
                        $(".companyQuestion").text(ui.item.label);
                        console.log($("#companyID").val());
                    }
            });

        });
    </script>

</head>
<body>
    <?php
        include '/resources/php/navbar.php';

        if( isset($_POST['post_company']) ){
            if( !isset($_POST['post_title']) || $_POST['post_title'] == ""  ){
                echo '<div class="alert alert-warning text-center">Post title Missing!</div>';
            }
        }
    ?>

    <div class="container">

        <h1 class="page-header">Company Post &nbsp; <small>Review a company</small></h1>

        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">
                <form method="POST" action="/createCompanyPost.php">


                    <div class="form-group">
                        <label for="post_title">Company</label>
                        <input id="autoC" class="form-control" placeholder="Start typing.." />
                        <input type="hidden" name="companyID" id="companyID" />
                    </div>

                    <div class="form-group">
                        <label for="post_title">Give your post a title/subject line</label>
                        <input type="text" class="form-control" name="post_title" id="post_title" />
                    </div>

                    <div class="form-group">
                        <label for="pos_content">
                            How did you like working for <span class="companyQuestion">the company</span>?<br />
                            Would you recommend a career at <span class="companyQuestion">the company</span>?<br />
                            What worked well at  <span class="companyQuestion">the company</span>?
                        </label>
                        <textarea class="form-control" name="pos_content" id="pos_content" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating: &nbsp; </label>
                        <label class="radio-inline">
                            <input type="radio" name="rating" value="1" /> 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rating" value="2" /> 2
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rating" value="3" /> 3
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rating" value="4" /> 4
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rating" value="5" /> 5
                        </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary btn-block" name="post_company" >Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
