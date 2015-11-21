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
            echo "<a class=\"list-group-item\" href=\"/register.php\">New user? Create an account</a>";
        }
    ?>

    <a class="list-group-item" href="/browsecos.php">Browse companies by rank  </a>

    <a class="list-group-item" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/createJobPost.php"' : 'href="/login.php"'); ?> >
        Post a position
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
        <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
    </a>
    <a class="list-group-item" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/browseJobPosts.php"' : 'href="/login.php"'); ?> >
        Browse position posts
    </a>
    <a class="list-group-item" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/searchPosts.php"' : 'href="/login.php"'); ?> >
        Search for specific position posts
    </a>
    <a class="list-group-item" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/profile.php"' : 'href="/login.php"'); ?> >
        View your profile information
    </a>

</div>
