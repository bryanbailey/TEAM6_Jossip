<?php
/**
 * Created by PhpStorm.
 * User: keljo
 * Date: 11/16/2015
 * Time: 11:16 AM
 */

    function createDBConnection(){

        try {
            $mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");
        } catch (\Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
        return $mysqli;

    }

?>