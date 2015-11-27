<?php
session_start();
if( isset($_POST['post_company'])) {
    require '/resources/php/createCompanyPostScript.php';

}
try {
    $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
    $companyListSQL = " SELECT `company_id`, `company_name`
                        FROM `Company`
                            LEFT JOIN `Employment_History`
                            ON `Company`.`company_id` = `Employment_History`.`fk_company_id`
                        WHERE `fk_user_id` = ".$_SESSION['user_id'];
    $companyListQuery = $mysqli->query($companyListSQL);
    $companyListCount = $companyListQuery->num_rows;
    $mysqli->close();
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
    <meta name="author" content="Praveen Kumar G, Kasey Eljoundi">
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
        ul.ui-autocomplete{ /* company dropdown list */
            background-color: lightgray;
        }

        .companyName { /* displaying co name in questions */
            text-decoration: underline;
            font-style: italic;
        }
    </style>

    <script>
        $(document).ready(function() {

            $(".modal").modal();


            $("#autoC").autocomplete({
                source: <?php echo $companyList; ?>,
                select:
                    function(event, ui){
                        event.preventDefault();
                        $(this).val(ui.item.label);
                        $("#companyID").val(ui.item.value);
                        $(".companyName").text(ui.item.label);
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

    <div class="modal fade in" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you posting about the same company as your last post?
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">No</button>
                    <button class="btn btn-primary">Yes!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <h1 class="page-header">Company post &nbsp; <small>Review a current or former employer</small></h1>

        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">
                <form method="POST" action="/resources/legacy/createCompanyPost.php">


                    <div class="form-group">
                        <label for="post_title">Company</label><br>
                        <select id="autoC" class="form-control" <?php echo ($companyListCount<1) ? ' disabled="disabled" ':''; ?> >
                            <?php
                            while( $company = $companyListQuery->fetch_assoc() ){
                                echo '<option value="',$company['company_id'],'">',$company['company_name'],'</option>';
                            }
                            ?>
                        </select>
                        <?php
                        if($companyListCount < 1){
                            echo '<div class="alert alert-danger text-center">
                                <strong>No employment history!</strong>
                                <a href="/login.php">Fill out your profile!</a>
                               </div>';
                        }
                        ?>
                    </div>

                    <div class="rating">
                        <span>Please rate the company:</span>
                        <input type="radio" id="star5" name="jobrating" value="5" /><label for="star5" title="Best">5 stars</label>
                        <input type="radio" id="star4" name="jobrating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                        <input type="radio" id="star3" name="jobrating" value="3" /><label for="star3" title="Satisfactory">3 stars</label>
                        <input type="radio" id="star2" name="jobrating" value="2" /><label for="star2" title="Not great">2 stars</label>
                        <input type="radio" id="star1" name="jobrating" value="1" /><label for="star1" title="Unsatisfactory">1 star</label>
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
