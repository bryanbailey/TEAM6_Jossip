<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/29/2015
 * Time: 4:55 PM
 */
?>

<div id="sidebarList" class="list-group">
    <?php
        if( !isset( $_SESSION['JobGossipLogin'] ) ) {
            echo "<a class=\"list-group-item\" href=\"/login.php\">Login</a>";
        }
    ?>
    <a class="list-group-item" href="/register.php">New user? Create an account</a>
    <a class="list-group-item" href="/browsecos.php">Browse company rankings</a>
    <a class="list-group-item" href="/createCompanyPost.php">
        Rate a Company
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
    </a>

</div>
