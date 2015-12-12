<?php

session_start();
require '/resources/php/viewpostFunction.php';
$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
  $cP = $_GET['compna'];
$userid= $_SESSION['user_id'];
  $postListSQL = " SELECT DISTINCT position_title,position_post.post_content,position_post.post_id,
 (SELECT round(AVG(rating),0) from position_post_rating WHERE position_post_rating.fk_position_post=$cP and fk_user_id = $userid ) as rating,
 (SELECT truncate(AVG(rating),2) from position_post_rating WHERE position_post_rating.fk_position_post=$cP) as rating_value,
  (SELECT user.username FROM user WHERE user.user_id=position_post.fk_user_id) as first_name,
  (SELECT company.company_name FROM company WHERE company.company_id=position_post.fk_company_id) as company_name
  FROM position_post,company,company_post
  WHERE position_post.post_id=$cP
                    ";
  $postListSQLQuery = $mysqli->query($postListSQL);
  $post = $postListSQLQuery->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Viewing position post</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <script src="/vendors/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- General Job Gossip styling -->
    <link rel="stylesheet" href="/resources/css/jgStyle.css">
    <script>
              $(document).ready(function() {
                var value="" ;
                $("input:radio[name=jobrating]").click(function() {
                value = $(this).val();

                });
            /* make navbar, sidebar list link display as active for current page */
            $("#navbar a[href=\"/viewPost.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/viewPost.php\"]").addClass("active");
          $("#Ratepost").click(function(){
              var Rateposts = {"action":"RatePostsinfo", "post_id":"<?php echo $post['post_id'];?>", "rating":value};
                  $.ajax({
                  url: './resources/php/viewpostFunction.php',
                  type: "POST",
                  data: Rateposts,
                  success:
                      function(){
$("body>.container").prepend('<div class="alert alert-success">Your Rating has been Posted!</div>');
                      }
              });
                                            });
                                            $(function() {
                                              var $radios = $('input:radio[name=jobrating]');
                                              if($radios.is(':checked') === false) {
                                              $radios.filter('[value=<?php echo $post['rating']; ?>]').prop('checked', true);
    }
});


            });
    </script>
</head>
<body>
<?php
include '/resources/php/navbar.php';
?>
<div class = "container">
    <h1 class="page-header">Jossip post</h1>
    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>
    <div class = "col-sm-9">
        <?php

            echo '
            <div class="panel panel-default">
          <div class="panel-heading"><h3><b>',$post['company_name'],'</b></h3></div> </a>
                    <div class="panel-body">Position: <b>',$post['position_title'],'</b></span>
                        <div class="panel-body"><b>Comments:</b>
                         ',$post['post_content'],'</span>
                        </div>
                    <div class="panel-heading" style="font-size:small"><i></b>Poster: <b>',$post['first_name'],'</i></b>
                <div class="pull-right" style="font-size: small">Rating:<b>',$post['rating_value'],'</b>
            </div> </div> </div>
</div>
    <br>
        <span clas="pull-left"> Please rate this post in terms of its helpfulness to you:</span><br>
        <div class="rating">
          <input type="radio" id="star5" name="jobrating" value="5" /><label for="star5" title="Best">5 stars</label>
          <input type="radio" id="star4" name="jobrating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
          <input type="radio" id="star3" name="jobrating" value="3" /><label for="star3" title="Satisfactory">3 stars</label>
          <input type="radio" id="star2" name="jobrating" value="2" /><label for="star2" title="Not great">2 stars</label>
          <input type="radio" id="star1" name="jobrating" value="1" /><label for="star1" title="Unsatisfactory">1 star</label>
        </div>
    <br><br>
    <div class="form-group">
           <span class="pull-left"><button type="submit" id="Ratepost" class="form-control btn btn-primary btn-block" name="post_position">Rate post</button></span>
    </div>
    ';
    ?>
    </div>
</div>
</body>
</html>
