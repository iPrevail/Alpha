<?php
# Licence Info: MIT
# Copyright (C) 2016 BitCore
# A Open Source Project
# Project Developer: iPrevail
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."inc".DIRECTORY_SEPARATOR."functions.php");
dbcore();

$proof = array_merge(Cypher('global'));

echo "{$proof['login_user_name']}";
?>