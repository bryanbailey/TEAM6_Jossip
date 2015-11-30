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

        $deleteSQL = "UPDATE position_post_rating SET rating=$lastName WHERE fk_position_post=$firstName";
        $CPQuery = $mysqli->query($deleteSQL);
        $mysqli->close();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
  
}
?>
