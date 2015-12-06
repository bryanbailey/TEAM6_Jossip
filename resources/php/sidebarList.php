<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/29/2015
 * Time: 4:55 PM
 */
?>

<!-- <div id="sidebarList" class="list-group">
    <?php
        if( !isset( $_SESSION['JobGossipLogin'] ) ) {
            echo "<a class=\"list-group-item\" href=\"/login.php\">Login</a>";
            echo "<a class=\"list-group-item\" href=\"/register.php\">New user? Create an account</a>";
        }
    ?>
</div> -->
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li>
    <a class="active" <?php echo (!isset($_SESSION['JobGossipLogin'] ) ? 'href="/register.php"' : 'href="/index.php"'); ?> >
      <i class="fa fa-fw fa-dashboard"></i>
      new user?Create your Account!
    </a>
      </li>
        <li>
          <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/browseJobPosts.php"' : 'href="/login.php"'); ?> >
          <i class="fa fa-fw fa-table"></i>
          Browse position posts
          </a>
        </li>
        <li>
          <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/browsecos.php"' : 'href="/login.php"'); ?> >
          <i class="fa fa-fw fa-table"></i>
          Browse companies by rank
          </a>
        </li>
        <li>
              <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/searchPosts.php"' : 'href="/login.php"'); ?> ><i class="fa fa-fw fa-edit"></i> Search Posts</a>
        </li>
        <li>
            <a class="active" <?php echo (isset($_SESSION['JobGossipLogin'] ) ? 'href="/createJobPost.php"' : 'href="/login.php"'); ?> ><i class="fa fa-fw fa-desktop"></i> Post a position
            <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
            <span class="glyphicon glyphicon-star glyphicon-star-gold"></span>
            <span class="glyphicon glyphicon-star glyphicon-star-gold"></span></a>
        </li>

        <li>
            <a href="/profile.php"><i class="fa fa-fw fa-dashboard"></i> View your profile information!</a>
        </li>
    </ul>
</div>
