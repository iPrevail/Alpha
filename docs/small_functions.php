<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'global.php');
DefineCMS_Checker(false);
/** 
  * 3353 Pre-Alpha v1
  * License Info: GPL
  * Original Developer: BamBam0077 
  * Based On BitTorrent Sources Like: TS, FREETSP, TorrentTrader.
  * @filename control_board
  * Respect to those that deserve it! 
  **/
  
  /**
  Credits Orginal Coder
  $res = SQL_Query_exec("SELECT last_time FROM tasks WHERE task = 'cleanup'");
  $row = mysql_fetch_row($res);
  if (!$row){
		$lastclean="never done...";
  }else{
  **/	  
function staff_panel_access() {
  
  /** Example: D12
  $result = mysqli_query("SELECT Access FROM staffpanel") or mysqli_error(__FILE__, __LINE__);
  $row_row = mysqli_fetch_row($result);
  
  $xzib_em[""] => $result
  **/
  // $CURUSER[""] Now $xzib_em[""] [= 
  if ( $xzib_em["Access"] != "yes" ) :
  
    show_std_msg("Restricted Area, Go Back Clown.");
  endif;
}  
  /** 
   Credits Original Coder
   function sqlesc ($x)
   {
    return "'".mysql_real_escape_string($x)."'";
   }
  **/ 
 function pokemon($catch_em_all) {
	 
  return "'".mysqli_real_escape_string($catch_em_all)."'";	 
 }
 
 /**
  Credits Orginal Coder
  $res = SQL_Query_exec("SELECT last_time FROM tasks WHERE task = 'cleanup'");
  $row = mysql_fetch_row($res);
  if (!$row){
		$lastclean="never done...";
  }else{
	$row[0]=gmtime()-$row[0]; $days=intval($row[0] / 86400);$row[0]-=$days*86400;
	$hours=intval($row[0] / 3600); $row[0]-=$hours*3600; $mins=intval($row[0] / 60);
	$secs=$row[0]-($mins*60);
	$lastclean = "$days days, $hours hrs, $mins minutes, $secs seconds ago.";
  }  
 **/
 function last_clean_up() {
 
  $batman__eminem = mysqli_query("SELECT last_visit FROM system WHERE system='".pokemon('cleanup')."'") or mysqli_error(__FILE__, __LINE__);
  $robin__hood    = mysqli_fetch_row($batman__eminem);
  
  if (!$robin_hood):
	  
	 $last_clean_up = "Last Clean Up? Has not been used yet."; 
  endif;
  
  else {
	  
	$robin__hood[0] = current_time() - $robin__hood[0];
    $clean_up_day   = intval($robin__hood[0] / 86400);
	$clean_up_hour  = intval($robin__hood[0] / 3600);
    $robin__hood[0]-= $clean_up_hour * 3600;
    $clean_up_min   = intval($robin__hood / 60);
    $clean_up_sec   = $robin__hood[0] - ($clean_up_min * 60);
    $last_clean_up  = "".htmlspecialchars($clean_up_day)." Days, ".htmlspecialchars($clean_up_hour)." Hours, ".htmlspecialchars($clean_up_min)." Minutes, ".htmlspecialchars($clean_up_sec)." Seconds Ago." 	
  }  
 }

 