-- SQL FILE:
--
-- 3353 Pre-Alpha v1
-- License Info: GPL
-- Original Developer: BamBam0077 
-- Based On BitTorrent Sources Like: TS, FREETSP, TorrentTrader.
-- @filename DEFAULT SQL 
-- Respect to those that deserve it! 

----------------------------------------------------------------------------
DROP TABLE IF EXISTS `cms_announce`;
CREATE TABLE `cms_announce` (
 
     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
	 `cloud` int(10) unsigned NOT NULL default '0',
	 `seeders` unsigned NOT NULL default '0',
	 `leechers` unsigned NOT NULL default '0',
	 `times_completed` int(10) unsigned NOT NULL DEFAULT '0',
     `file_online` enum('yes', 'no') NOT NULL DEFAULT 'yes',

     PRIMARY KEY (`id`),
     KEY `cloud` (`cloud)	 
	 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_forum_attachments`;
CREATE TABLE `cms_forum_attachments` (

   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `pid` int(10) unsigned NOT NULL default '0',
   `posthash` varchar(50) NOT NULL default '0',
   `filename` varchar(255) collate utf8_unicode_ci NOT NULL default '',
   `filetype` varchar(100) collate utf8_unicode_ci NOT NULL,
   `filesize` bigint(20) unsigned NOT NULL default '0',
   `date_uploaded` datename NOT NULL default '0000-00-00 00:00:00',
   `downloads` int(10) unsigned NOT NULL default '0',
    
	PRIMARY KEY (`id`),
	KEY `pid` (`pid`)
    
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_attachment_types`;
CREATE TABLE `cms_attachment_types` (

   -- ADD YOUR OWN SQL CODE --

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_word_filter`;
CREATE TABLE `cms_word_filter` (

     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
     `added` datetime NOT NULL default '0000-00-00 00:00:00',
     `badword` varchar(100) NOT NULL default '',
     `replacement` varchar(100) NOT NULL default '',
	 
	 PRIMARY KEY (`id`)
	 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_bans`;
CREATE TABLE `cms_bans` (
  
     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
     `added` datetime NOT NULL default '0000-00-00 00:00:00',
     `addedby` int(10) unsigned NOT NULL default '0',
     `reason` varchar(255) collate utf8_unicode_ci NOT NULL default '',
     `fip` int(11) default NULL,
     `lip` int(11) default NULL,	 

     PRIMARY KEY (`id`),
     KEY `first_last` (`fip`, `lip`)	 
  
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

DROP TABLE IF EXISTS `cms_forums`;
CREATE TABLE `cms_forums` (

     `minclasscreate` tinyint(3) unsigned NOT NULL default '0',
	 `minclasswrite` tinyint(3) unsigned NOT NULL default '0',
	 `minclassread` tinyint(3) unsigned NOT NULL default '0',
     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `name` varchar(60) collate utf8_unicode_ci NOT NULL default '',
	 `description` varchar(200) collate utf8_unicode_ci default NULL,
	 `sort` tinyint(3) unsigned NOT NULL default '0',
	 `forid` tinyint(4) default '0',
	 `postcount` int(10) unsigned NOT NULL default '0',
	 
     PRIMARY KEY (`id`)
	 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_security_captcha`;
CREATE TABLE `cms_security_captcha` (

     `imagehash` varchar(32) NOT NULL default '',
     `imagestring` varchar(8) NOT NULL default '',
     `dateline` int unsigned NOT NULL default '0',
     `used` tinyint(1) NOT NULL default '0',
  
     KEY `imagehash` (`imagehash`),
     KEY `dateline` (`dateline`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `cms_files`;
CREATE TABLE `cms_files` (

     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `cloud` int(10) unsigned NOT NULL default '0',
	 `filename` varchar(255) collate utf8_unicode_ci NOT NULL default '',
	 `filesize` bigint(20) unsigned NOT NULL default '0',
	 
	 PRIMARY KEY (`id`),
	 KEY `cloud` (`cloud`)
	 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 