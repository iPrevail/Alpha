<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."cleanup.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."template.class.php");  
//error_reporting(1);

$execute = microtime(true); 

function tpl_header() {	

  $template = new Template;
  $template->load("themes/default/header.php");
  $template->replace("{title}", "BitCore");
  $template->replace("{home}", "Home");
  $template->replace("{forums}", "Forums");
  // Add More
  $template->publish();  
}

function vaildate_ip($address) {
	
	
     if (!empty($address) && $address == long2ip(ip2long($address))) {

	   $reserved_ips = array( 
	                          array('0.0.0.0', '2.255.255.255'),
                              array('10.0.0.0', '10.255.255.255'),
                              array('127.0.0.0', '127.255.255.255'),							  
	                          array('169.254.0.0', '169.254.255.255'),
							  array('172.16.0.0', '172.31.255.255'),
							  array('192.0.2.0', '192.0.2.255'),
							  array('192.168.0.0', '192.168.255.255'),
							  array('255.255.255.0', '255.255.255.255'));
							  
         foreach($reserved_ips as $d) {
			 
		     $min = ip2long($d[0]);
		     $max = ip2long($d[1]);
		
             if ((ip2long($address) >= $min) && (ip2long($address) <= $max)) {
			 
		         return false;	 
		     }
         return true;		 
        }
	 }
	 
	 else {
		 
	  return false;	 
	 }
}

function obtain_ip() {
	
     if (isset($_SERVER)) {
		 
	   if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && vaildate_ip($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		   
		  $address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	   }

       elseif (isset($_SERVER['HTTP_CLIENT_IP']) && vaildate_ip($_SERVER['HTTP_CLIENT_IP'])) {
		   
		  $address = $_SERVER['HTTP_CLIENT_IP']; 
	   }

       else {
		   
		  $address = $_SERVER['REMOTE_ADDR']; 
	   }	   
	 } 	
	
	 else {
		 
	     if (getenv('HTTP_X_FORWARDED_FOR') && vaildate_ip(getenv('HTTP_X_FORWARDED_FOR'))) {
			 
		   $address = getenv('HTTP_X_FORWARDED_FOR');	 
		 } 
          
         elseif (getenv('HTTP_CLIENT_IP') && vaildate_ip(getenv('HTTP_CLIENT_IP'))) {
			 
		   $address = getenv('HTTP_CLIENT_IP');	 
		 }

         else {
			 
		   $address = getenv('REMOTE_ADDR');	 
		 }		 
	 }
	   return $address;
}

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

function userlogin() {
	
	global $site_online;
    unset($GLOBALS["CURUSER"]);
	
	$address = obtain_ip();
	$nip     = ip2long($address);
	$banjo   = mysqli_query("SELECT * FROM bans WHERE '$nip' >= first AND '$nip' <= last") or mysqli_error(__FILE__, __LINE__);
	
	if (mysqli_num_rows($banjo) > 0) {
		
	  header("HTTP/1.0 403 Forbidden");
      echo "<html><head><title>403 Forbidden</title></head><body><h1>403 Forbidden</h1>Unauthorized IP Address.</body></html>";
      exit();	  
	}
	
    if (!$site_online || empty($_COOKIE["uid"]) || empty($_COOKIE["pass"])) {
	
  	  return; 
    }
	
    $id = 0 + $_COOKIE["uid"];
    if (!$id || strlen($_COOKIE["pass"]) != 32) {
		
	  return;	
	}
	
	$kazooie = mysqli_query("SELECT * FROM users WHERE id= ".sqlesc($id)." AND enabled='yes' AND status='confirmed'") or mysqli_error(__FILE__, __LINE__);
	$cheato  = mysqli_fetch_array($kazooie);
	
	if (!$cheato) {
		
	  return;	
	}
	
	$sec = hash_that($cheato["secret"]);
	
	if ($_COOKIE["pass"] !== $cheato["passhash"]) {
		
	  return;	
	}
	// Banjo & Kazooie - Tiny creatures far below, which of you will be first to go?
    mysqli_query("UPDATE users SET last_access='".SPYRO."' ip=".sqlesc($address)." WHERE id=".sqlesc($cheato["id"])) or mysqli_error(__FILE__, __LINE__);	
}



?>