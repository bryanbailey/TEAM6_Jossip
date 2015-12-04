<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if( isset($_POST['action']) ){
    switch($_POST['action']){
                case 'RatePostsinfo':
                        $result = RatePostsinfo($_SESSION['user_id'], $_POST['post_id'], $_POST['rating']);
                        break;
          }
}
//Rate posts
function RatePostsinfo($userID, $firstName, $lastName){
    try {
        $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

        $selectsql="SELECT COUNT(fk_position_post) as pp_count FROM position_post_rating WHERE fk_position_post=$firstName";
        $CPQuery = $mysqli->query($selectsql);
        $post = $CPQuery->fetch_assoc();
        if ($post['pp_count']==0) {

          $insertsql="INSERT INTO position_post_rating VALUES($firstName,$userID,$lastName)";
          $CPQuery1 = $mysqli->query($insertsql);
        }
        if ($post['pp_count']==1){
        $updatesql= "UPDATE position_post_rating SET rating=$lastName WHERE fk_position_post=$firstName";
        $CPQuery2 = $mysqli->query($updatesql);
        }
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

}
?>
