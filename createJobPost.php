<!-- I just copied the createCompanyPost page for the sake of making this page - this should be the landing
page for the "Yes" answer in the modal box on that page; this page is for a user who has an existing post with a company
and should select the company from a drowpdown list (marked below) and fill in the position information the same as in
the createCompanyPost page. -->


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
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Create additional company post</title>
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
    <link rel="stylesheet" href="/resources/css/createJobPost.css">

    <style type="text/css">
        .companyName { /* displaying co name in questions */
            text-decoration: underline;
            font-style: italic;
        }

        #postError{
            display: none;
        }
    </style>

    <script>
        $(document).ready(function(){

            /* default dropdown list to blank entry - forces users to select co */
            $("#companyDropdown").prop("value", "-1");

            /* display selected company name in guiding questions */
            $("#companyDropdown").change(function(){
                if( $(this).val() > 0 ){
                    $(".companyName").text( $("#companyDropdown option:selected").text() );
                }else{
                    $(".companyName").text("the company");
                }
            });

            $("#companyDropdown").focusin(function(){
                $("#dropdownHint").show();
            });

            $("#submitButton").click(function(){
                if( !$("#post_position").val() || !$("#post_content").val() || $("#companyDropdown").val() < 1 ){
                    if( !$("#post_position").val() ){
                        $("#post_position").parents(".form-group").addClass("has-error");
                    }
                    if( !$("#post_content").val() ){
                        $("#post_content").parents(".form-group").addClass("has-error");
                    }
                    if( $("#companyDropdown").val() < 1 ){
                        $("#companyDropdown").parents(".form-group").addClass("has-error");
                    }
                }else{
                    $.ajax({
                        url: "/resources/php/createJobPostScript.php",
                        type: "POST",
                        data: { "position":$("#post_position").val() , "content":$("#post_content").val(), "company": $("#companyDropdown").val()  },
                        success:
                            function(result) {
                                if( result == "1" ){ //if insertion query succeeded
                                    $("#success-modal").modal('show');
                                }else{
                                    $("#companyDropdown").prop("value", "-1");
                                    $("#postError").show();
                                }
                            }
                    });

                }
            });


        });
    </script>
    <style type="text/css">



    </style>

</head>
<body>

<?php
include './resources/php/navbar.php';
?>

<div class="modal" id="success-modal">
    <div class="modal-dialog">
        <span class="glyphicon glyphicon-ok"></span>
        <div class="success-text">Post Submitted!</div>
        <a class="btn btn-xs btn-default" href="./index.php">OK</a>
    </div>
</div>


<div class="container">

    <div class="alert alert-danger" id="postError">
        <strong>Uh Oh..</strong> Something went wrong creating your post. Please try again.
    </div>

    <h1 class="page-header">New position post &nbsp; <small>Review a current or former position</small></h1>


        <div class="col-sm-6 col-sm-offset-3">

            <div class="form-group">
                <label for="post_title">Company</label><br>
                <select id="companyDropdown" class="form-control" <?php echo ($companyListCount<1) ? ' disabled="disabled" ':''; ?> >
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

<!--    The preceding should present as a pulldown list of the companies associated with the logged-in user. The rest of the page is the
    new position that user holds and it should be posted to the database in association with that user and the company.
-->
            </div>

            <div class="form-group">
                <label for="post_position">Position / job title</label>
                <input type="text" class="form-control" id="post_position" />
            </div>

            <div class="form-group">
                <label for="post_content">
                    How did you like working for <span class="companyName">the company</span>?<br />
                    Would you recommend this position at <span class="companyName">the company</span>?<br />
                    What worked well at  <span class="companyName">the company</span>?
                </label>
                <textarea class="form-control" id="post_content" rows="5"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary btn-block"  id="submitButton" <?php echo ($companyListCount<1) ? ' disabled="disabled" ':''; ?>>
                    Post
                </button>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="alert alert-info text-center" id="dropdownHint">
                <a href="/profile.php">Don't see your company? Go to your profile to add one.</a>
            </div>

        </div>


</div>
</div>

</body>
</html>