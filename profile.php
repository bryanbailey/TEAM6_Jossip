<?php

require '/resources/php/generalFunctions.php';
require '/resources/php/profileFunctions.php';

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

$mysqli = createDBConnection(); //db connection object

$history = getCompanyHistory($_SESSION['user_id']);//employment history of user

$companies = getCompanyList($mysqli);//company list for dropdown
$companyArray = array();
while( $row = $companies->fetch_assoc() ){
    $companyArray[] = $row;
}
$companyList = json_encode($companyArray);

$userInfo = getUserInfo($_SESSION['user_id']); //user info
$userInfo = $userInfo->fetch_assoc();

$positionCount = getPostCount($mysqli, $_SESSION['user_id']);

$mysqli->close();


?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Jossip user profile page</title>

    <!-- jquery 2.1.4, jquery ui 1.11.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>
    <script src="/vendors/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/vendors/jquery-ui-1.11.4/jquery-ui.min.css" />

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css" />

    <!-- general Joossip styling -->
    <link rel="stylesheet" type="text/css" href="/resources/css/jgStyle.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/profile.css" />


    <script>
        $(document).ready(function() {

            $("#showCompanyInput").click(function(){
                $("#addEmploymentHistory").modal('show');
            });

            $("#companyInput").autocomplete({
                source: <?php echo $companyList; ?>,
                select:
                    function(event, ui){
                        event.preventDefault();
                        $(this).val(ui.item.label);
                        $("#companyID").val(ui.item.value);
                        console.log(ui.item.value);
                    },
                appendTo: $("#companyInput").parent(".form-group")
            });

            $("#companyStart").datepicker({dateFormat: "yy-mm-dd"});
            $("#companyEnd").datepicker({dateFormat: "yy-mm-dd"});

            /* save star rating  */
            $starRating=0;
            $('.rating > input[type="radio"]').click(function(){
                $starRating = $(this).val();
            });

            /*
                submit work history
             */
            $("#submitCompany").click(function(){
               var companyData = {"action":"addEmploymentHistory", "companyID":$("#companyID").val(), "startDate":$("#companyStart").val(), "endDate":$("#companyEnd").val(), "rating":$starRating };
                console.log(companyData);
                $.ajax({
                    url: './resources/php/profileFunctions.php',
                    type: "POST",
                    data: companyData,
                    success:
                        function(){
                            $("#addEmploymentHistory").hide();
                            $stars = "";
                            for(i=0; i<$starRating; i++){ $stars += '<span class="glyphicon glyphicon-star"></span>'; }
                            $("#employmentHistory table tbody").append('<tr><td>'+$("#companyInput").val()+'</td>'
                                                                            +'<td>'+$("#companyStart").val()+'</td>'
                                                                            +'<td>'+$("#companyEnd").val()+'</td>'
                                                                            +'<td>'+$stars+'</td></tr>');
                            $("#addEmploymentHistory input").val("");
                            $("#addEmploymentHistory").modal('hide');
                            $starRating=0;
                        }
                });
            });

            /*
                update user info
             */
            $("#saveUserInfo").click(function(){
                var userData = {"action":"updateUserInfo", "first_name":$("#first_name").val(), "last_name":$("#last_name").val(), "email":$("#email").val()};
                $.ajax({
                    url: './resources/php/profileFunctions.php',
                    type: "POST",
                    data: userData,
                    success:
                        function(){
                            $("#userInfoSavedAlert").show();
                        }
                });
            });
            /*  Delete */

            $("#deleteUser").click(function(){
                var DeleteData = {"action":"deleteUserInfo", "first_name":$("#first_name").val(), "last_name":$("#last_name").val()};
                $.ajax({
                    url: './resources/php/profileFunctions.php',
                    type: "POST",
                    data: DeleteData,
                    success:
                        function(){
                            $("#userInfoSavedAlert").show();
                        }

                });
            });



        });
    </script>

</head>

<body>

    <div class="modal" id="addEmploymentHistory">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add Employment History</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" id="companyInput" placeholder="Company" />
                        <input type="hidden" id="companyID" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="companyStart" placeholder="start" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="companyEnd" placeholder="end" />
                    </div>
                    <div class="form-group text-center clearfix">
                        <div class="rating">
                            <input type="radio" id="star5" name="jobrating" value="5" /><label for="star5" title="Best">5 stars</label>
                            <input type="radio" id="star4" name="jobrating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                            <input type="radio" id="star3" name="jobrating" value="3" /><label for="star3" title="Satisfactory">3 stars</label>
                            <input type="radio" id="star2" name="jobrating" value="2" /><label for="star2" title="Not great">2 stars</label>
                            <input type="radio" id="star1" name="jobrating" value="1" /><label for="star1" title="Unsatisfactory">1 star</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right" id="submitCompany"><span class="glyphicon glyphicon-floppy-save"></span></button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './resources/php/navbar.php';
    ?>

    <div class="container-fluid">

        <!-- profile overview -->
        <div class="row profile-header-row">
            <div class="col-xs-6 col-sm-3 col-sm-offset-3 profile-header">
                <div class="large-circle"><p><?php echo $positionCount; ?></p></div>
                <h4>Posts created</h4>
                <span class="text-muted">
                <?php
                    switch( intval($positionCount) ){
                        case 0:
                            echo 'Get Posting!';
                            break;
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                            echo 'Gaining Jossip Points!';
                            break;
                        case 5:
                        case 6:
                            echo 'Keep them coming!';
                            break;
                        case 7:
                        default:
                            echo 'Power User!';
                            break;
                    }
                ?>
                </span>
            </div>
            <div class="col-xs-6 col-sm-3 profile-header">
                <div class="large-circle"><p>4.3</p></div>
                <h4>Avg Post Score</h4>
                <span class="text-muted">4.3/5</span>
            </div>
        </div>

        <!-- work history -->
        <div class="row" id="employmentHistory">
            <div class="col-md-8 col-md-offset-2">
                <h4>Employment History</h4>
                <table class="table table-striped">
                    <thead>
                        <th>Company</th>
                        <th class="text-muted">start</th>
                        <th class="text-muted">end</th>
                        <th>My Rating</th>
                    </thead>
                    <tbody>
                        <?php
                        while($company = $history->fetch_assoc()){
                            echo '<tr>
                                    <td>',$company['company_name'],'</td>
                                    <td>',$company['start_date'],'</td>
                                    <td>',$company['end_date'],'</td>
                                    <td>';
                                        for($i=0;$i<$company['company_rating'];$i++){
                                            echo '<span class="glyphicon glyphicon-star"></span>';
                                        };
                            echo    '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <button class="btn btn-link" id="showCompanyInput">Add a company</button>

            </div>
        </div>

        <!-- personal info -->
        <div class="row" id="personalInfo">
            <div class="col-md-8 col-md-offset-2">
                <div class="well well-sm">
                    <h4>Personal Info</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $userInfo['first_name']; ?>" />
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $userInfo['last_name']; ?>" />
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $userInfo['email']; ?>" />
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4"><button class="btn btn-primary btn-block" id="saveUserInfo">Update Info</button></div>
                        <div class="col-sm-4"><div class="alert alert-success text-center" id="userInfoSavedAlert">Saved!</div></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-4"><button class="btn btn-danger btn-block" id="deleteUser">Delete profile</button></div>
        </div>

    </div>

</body>
</html>
