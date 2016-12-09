<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
# Credits: http://www.broculos.net/2008/03/how-to-make-simple-html-template-engine.html#.WEo4rH0YDIU
# Modified By: iPrevail

class Legacy {
	
  public $oneshot;
  // dirpath = filepath
  function freestyle($dirpath) {
	  
     $this->Legacy = file_get_contents($dirpath);	 
  }  
  // function replace($var, $content)
  function rapgod($eminem, $content) {
	  
  $this->Legacy = str_replace("{$eminem}", $content, $this->Legacy);  
  }
  
  function freestyle_marshall() {
	  
	 eval("?>".$this->Legacy."<?php"); 
  }
}
?>
