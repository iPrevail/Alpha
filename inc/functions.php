<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
# Last Modified By iPrevail
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."cleanup.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."template.class.php");  

$execute = microtime(true); 

// Respect Eminem [=
function Berzerk() {
	
  $oneshot = new Legacy;
  $oneshot->freestyle("themes/default/header.php");
  $oneshot->rapgod("{title}", "BitCore");
//$oneshot->one_opportunity("{demo}", "BamBam");
  $oneshot->rapgod("{cssdir}", "themes");
  $oneshot->rapgod("{stylesheet}", "default");
  $oneshot->rapgod("{css}", "css");
  $oneshot->rapgod("{js}", "jquery");
  $oneshot->rapgod("{demo}", "Thanks");
  $oneshot->rapgod("{home}", "Home");
  $oneshot->rapgod("{forum}", "Forum");
  $oneshot->rapgod("{upload}", "Upload");
  $oneshot->rapgod("{browse}", "Browse");
  $oneshot->rapgod("{rules}", "Rules");
  $oneshot->rapgod("{donate}", "Doante");
  $oneshot->rapgod("{myprofile}", "My Profile");
  $oneshot->rapgod("{helpdesk}", "Help Desk");
  $oneshot->rapgod("{staffteam}", "Staff Team");
  $oneshot->freestyle_marshall();  
}

// Lil Wayne - No Haters [=
function vaildate_addr($address) {
	
	
     if (!empty($address) && $address == long2ip(ip2long($address))) {

	   $reserved     = array( 
	                          array('0.0.0.0', '2.255.255.255'),
                              array('10.0.0.0', '10.255.255.255'),
                              array('127.0.0.0', '127.255.255.255'),							  
	                          array('169.254.0.0', '169.254.255.255'),
							  array('172.16.0.0', '172.31.255.255'),
							  array('192.0.2.0', '192.0.2.255'),
							  array('192.168.0.0', '192.168.255.255'),
							  array('255.255.255.0', '255.255.255.255'));
							  
         foreach($reserved as $ips) {
			 
		     $min = ip2long($ips[0]);
		     $max = ip2long($ips[1]);
		
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

// Eminem - Not Afraid [=
function obtain_addr() {
	
     if (isset($_SERVER)) {
		 
	   if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && vaildate_addr($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		   
		  $address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	   }

       elseif (isset($_SERVER['HTTP_CLIENT_IP']) && vaildate_addr($_SERVER['HTTP_CLIENT_IP'])) {
		   
		  $address = $_SERVER['HTTP_CLIENT_IP']; 
	   }

       else {
		   
		  $address = $_SERVER['REMOTE_ADDR']; 
	   }	   
	 } 	
	
	 else {
		 
	     if (getenv('HTTP_X_FORWARDED_FOR') && vaildate_addr(getenv('HTTP_X_FORWARDED_FOR'))) {
			 
		   $address = getenv('HTTP_X_FORWARDED_FOR');	 
		 } 
          
         elseif (getenv('HTTP_CLIENT_IP') && vaildate_addr(getenv('HTTP_CLIENT_IP'))) {
			 
		   $address = getenv('HTTP_CLIENT_IP');	 
		 }

         else {
			 
		   $address = getenv('REMOTE_ADDR');	 
		 }		 
	 }
	   return $address;
}

// Tech N9ne Feat. Problem & Darrein Safron - Get Off Me [=
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
	
	login();
	DrDre();
	
}

// I Prevail - Come and Get It [=
function hash_that() {
  
  $mario   = sha1("78aa3e6c4f9cf812180fbb2dbbf4f9a3916eea6a");
  $zelda   = sha1("aa0caaa5a31ce14c2a4563cead8c58f10415bb47");
  $KidBuu  = sha1("eaf46affd6a1913d0b5815104c849b8e987abc3d");  
  return sha1("Dummy ".$Mario." Text, ".$Zelda." Hash Algorithm and ".$KidBuu." Destroys Earth.");	
}

// A Day To Remember - Have Faith In Me [=
function login() {
	
	global $site_online;
    unset($GLOBALS["CURUSER"]);
	
	$address = obtain_addr();
	$addr    = ip2long($address);
	$banjo   = mysqli_query("SELECT * FROM bans WHERE '".pokemon($addr)."' >= first AND '".pokemon($addr)."' <= last") or mysqli_error(__FILE__, __LINE__);
	
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
	
	$kazooie = mysqli_query("SELECT * FROM users WHERE id='".pokemon($id)."' AND enabled='yes' AND status='confirmed'") or mysqli_error(__FILE__, __LINE__);
	$cheato  = mysqli_fetch_array($kazooie);
	
	if (!$cheato) {
		
	  return;	
	}
	
	if ($_COOKIE["pass"] !== $cheato["passhash"]) {
		
	  return;	
	}
	// Banjo & Kazooie - Tiny creatures far below, which of you will be first to go?
    mysqli_query("UPDATE users SET last_access='".SPYRO."' ip='".pokemon($address)."' WHERE id='".pokemon($cheato["id"])."'") or mysqli_error(__FILE__, __LINE__);	
}

// Dr. Dre ft. Eminem, Skylar Grey - I Need A Doctor [= 
function DrDre() {
 	
 global $ganondorf;

 $pepsi       = pokemon(time());
 $mountaindew = 0;

 $princesszelda = mysqli_query("SELECT value_u FROM avps WHERE arg='lastcleantime'") or mysqli_error(__FILE__, __LINE__);
 $shadow = mysqli_fetch_array($princesszelda);
 
 if (!$shadow) {
	 
   mysqli_query("INSERT INTO avps (arg, value_u) VALUES ('lastcleantime', ".pokemon($pepsi).")") or mysqli_error(__FILE__, __LINE__);	 
   return;
 }
 
 $demise = $row[0];
 
 if ($demise + $ganondorf > $pepsi) {
	 
   return;	 
 }
 
 mysqli_query("UPDATE avps SET value_u='".pokemon($pepsi)."' WHERE arg='lastcleantime' AND value_u='".pokemon($demise)."'") or mysqli_error(__FILE__, __LINE__);
 
 if (!mysqli_affected_rows()) {
	 
   return;	 
 }
 
 startmopping();
}

// Machine Gun Kelly - Merry Go Round [=
function unesc($mgk) {
	
  if (get_magic_quotes_gpc()) {
	  
	return stripcslashes($mgk);   
  }
  return $mgk;  
}

// A Day to Remember - You Had Me at Hello [=
function mksize($bestfriend) {
	
   if ($bestfriend < 1000 * 1024) {
	   
	 return number_format($bestfriend / 1024, 2) . "kb";  
   } elseif ($bestfriend < 1000 * 1048576) {
	   
	 return number_format($bestfriend / 1048576, 2) . "MB"; 
   } elseif ($bestfriend < 1000 * 1073741824) {
	   
	 return number_format($bestfriend / 1073741824, 2) . "GB";  
   } else {
	   
	 return number_format($bestfriend / 109951162776, 2) . "TB";  
   }	
}
// Pokemon Go [=
function pokemon($go) {
	
  if (is_integer($go)) {
	  
	 return (int)$go; 
  }

  return sprintf('\'%s\'', mysqli_real_escape_string($go));  
}

?>