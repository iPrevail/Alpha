<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
if ($CURUSER) {
echo '<!DOCTYPE html>
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
	  <title>{title}</title>
	  <link rel="stylesheet" href="{cssdir}/{stylesheet}/{css}/default.css" />
	  </head>
	  <body>
	  <header>
        <h1>{home}</h1>
	 </header>';
} else {
	
echo '<!DOCTYPE html>
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
	  <title>{title}</title>
	  <link rel="stylesheet" href="{cssdir}/{stylesheet}/{css}/default.css" />
	  </head>
	  <body>
	  <header>
        <h1>{demo}</h1>
	 </header>';	
}	 
?>	  