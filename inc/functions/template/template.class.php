<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
# Credits: http://www.broculos.net/2008/03/how-to-make-simple-html-template-engine.html#.WEo4rH0YDIU
# Modified By: iPrevail

class Template {
	
  public $template;
  // dirpath = filepath
  function load($filepath) {
	  
     $this->Template = file_get_contents($filepath);	 
  }  
  // function replace($var, $content)
  function replace($bubsy, $content) {
	  
  $this->Template = str_replace("{$bubsy}", $content, $this->Template);  
  }
  
  function publish() {
	  
	 eval("?>".$this->Template."<?php"); 
  }
}
?>
