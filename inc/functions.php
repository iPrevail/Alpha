<?php
# Licence Info: MIT
# Copyright (C) 2016 BitDev
# A Open Source Project
# Project Developer: iPrevail
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."cleanup.php");

$execute = microtime(true); 




function dbcore() {
	require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."secrets.php");
	global $mysqli_hostname, $mysqli_username, $mysqli_password, $mysqli_database;

    class iPrevail extends mysqli {
        public function __construct( $mysqli_hostname, $mysqli_username, $mysqli_password, $mysqli_database ) {
            parent::__construct( $mysqli_hostname, $mysqli_username, $mysqli_password, $mysqli_database );

            if (mysqli_connect_error()) {
                print_r('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
            }
        }
    }

    new iPrevail( $mysqli_hostname, $mysqli_username, $mysqli_password, $mysqli_database );

}
?>