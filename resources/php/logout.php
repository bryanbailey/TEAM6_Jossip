<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 10/24/2015
 * Time: 11:50 PM
 */

    session_start();

    session_unset();

    session_destroy();

    header("Location: /index.php");

    exit();

?>