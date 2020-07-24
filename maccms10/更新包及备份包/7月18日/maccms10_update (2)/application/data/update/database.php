<?php
/*2019.1000.1024*/
if(empty($col_list[$pre.'website']['website_time_referer'])){
    $sql .= "ALTER TABLE `mac_website` ADD `website_time_referer`  INT( 10 ) unsigned NOT NULL DEFAULT  '0';";
    $sql .="\r";
}
/*2019.1000.1019*/
if(empty($col_list[$pre.'actor']['type_id'])){
    $sql .= "ALTER TABLE `mac_actor` ADD `type_id`  INT( 10 ) unsigned NOT NULL DEFAULT  '0',ADD `type_id_1`  INT( 10 ) unsigned NOT NULL DEFAULT  '0',ADD `actor_tag`  VARCHAR( 255 )  NOT NULL DEFAULT  '',ADD `actor_class`  VARCHAR( 255 )  NOT NULL DEFAULT  '';";
    $sql .="\r";
}
if(empty($col_list[$pre.'website'])){
    $sql .= "CREATE TABLE `mac_website` (  `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0',  `type_id_1` smallint(5) unsigned NOT NULL DEFAULT '0',  `website_name` varchar(60) NOT NULL DEFAULT '',  `website_sub` varchar(255) NOT NULL DEFAULT '',  `website_en` varchar(255) NOT NULL DEFAULT '',  `website_status` tinyint(1) unsigned NOT NULL DEFAULT '0',  `website_letter` char(1) NOT NULL DEFAULT '',  `website_color` varchar(6) NOT NULL DEFAULT '',  `website_lock` tinyint(1) unsigned NOT NULL DEFAULT '0',  `website_sort` int(10) NOT NULL DEFAULT '0',  `website_jumpurl` varchar(255) NOT NULL DEFAULT '',  `website_pic` varchar(255) NOT NULL DEFAULT '',  `website_logo` varchar(255) NOT NULL DEFAULT '',  `website_area` varchar(20) NOT NULL DEFAULT '',  `website_lang` varchar(10) NOT NULL DEFAULT '',  `website_level` tinyint(1) unsigned NOT NULL DEFAULT '0',  `website_time` int(10) unsigned NOT NULL DEFAULT '0',  `website_time_add` int(10) unsigned NOT NULL DEFAULT '0',  `website_time_hits` int(10) unsigned NOT NULL DEFAULT '0',  `website_time_make` int(10) unsigned NOT NULL DEFAULT '0',  `website_hits` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_hits_day` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_hits_week` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_hits_month` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_score` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',  `website_score_all` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_score_num` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_up` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_down` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_referer` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_referer_day` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_referer_week` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_referer_month` mediumint(8) unsigned NOT NULL DEFAULT '0',  `website_tag` varchar(100) NOT NULL DEFAULT '',  `website_class` varchar(255) NOT NULL DEFAULT '',  `website_remarks` varchar(100) NOT NULL DEFAULT '',  `website_tpl` varchar(30) NOT NULL DEFAULT '',  `website_blurb` varchar(255) NOT NULL DEFAULT '',  `website_content` mediumtext NOT NULL,  PRIMARY KEY (`website_id`),  KEY `type_id` (`type_id`),  KEY `type_id_1` (`type_id_1`),  KEY `website_name` (`website_name`),  KEY `website_en` (`website_en`),  KEY `website_letter` (`website_letter`),  KEY `website_sort` (`website_sort`),  KEY `website_lock` (`website_lock`),  KEY `website_time` (`website_time`),  KEY `website_time_add` (`website_time_add`),  KEY `website_hits` (`website_hits`),  KEY `website_hits_day` (`website_hits_day`),  KEY `website_hits_week` (`website_hits_week`),  KEY `website_hits_month` (`website_hits_month`),  KEY `website_time_make` (`website_time_make`),  KEY `website_score` (`website_score`),  KEY `website_score_all` (`website_score_all`),  KEY `website_score_num` (`website_score_num`),  KEY `website_up` (`website_up`),  KEY `website_down` (`website_down`),  KEY `website_level` (`website_level`),  KEY `website_tag` (`website_tag`),  KEY `website_class` (`website_class`),  KEY `website_referer` (`website_referer`),  KEY `website_referer_day` (`website_referer_day`),  KEY `website_referer_week` (`website_referer_week`),  KEY `website_referer_month` (`website_referer_month`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;";
    $sql .="\r";
}

/*2019.1000.1017*/
if(empty($col_list[$pre.'type']['type_logo'])){
    $sql .= "ALTER TABLE `mac_type` ADD `type_logo`  VARCHAR( 255 )  NOT NULL DEFAULT  '',ADD `type_pic`  VARCHAR( 255 )  NOT NULL DEFAULT  '',ADD `type_jumpurl`  VARCHAR( 150 )  NOT NULL DEFAULT  '';";
    $sql .="\r";
}

/*2019.1000.1011*/
if(empty($col_list[$pre.'collect']['collect_filter'])){
    $sql .= "ALTER TABLE `mac_collect` ADD `collect_filter` tinyint( 1 )  NOT NULL DEFAULT '0',ADD `collect_filter_from`  VARCHAR( 255 )  NOT NULL DEFAULT  '',ADD `collect_opt` tinyint( 1 )  NOT NULL DEFAULT '0';";
    $sql .="\r";
}

/*2019.1000.1007*/
if(empty($col_list[$pre.'vod']['vod_plot'])){
    $sql .= "ALTER TABLE `mac_vod` ADD `vod_plot` tinyint( 1 )  NOT NULL DEFAULT '0',ADD `vod_plot_name`  mediumtext  NOT NULL ,ADD `vod_plot_detail` mediumtext  NOT NULL ;";
    $sql .="\r";
}

/*2019.02.21.1001*/
if(empty($col_list[$pre.'user']['user_reg_ip'])){
    $sql .= "ALTER TABLE  `mac_user` ADD  `user_reg_ip` INT( 10 ) unsigned NOT NULL DEFAULT  '0' AFTER  `user_reg_time`;";
    $sql .="\r";
}
if(empty($col_list[$pre.'vod']['vod_behind'])){
    $sql .= "ALTER TABLE  `mac_vod` ADD  `vod_behind` VARCHAR( 100 )  NOT NULL DEFAULT  '' AFTER  `vod_writer`;";
    $sql .="\r";
}

/*2019.01.19.1001*/
if(empty($col_list[$pre.'user']['user_points_froze'])){
    $sql .= "ALTER TABLE  `mac_user` ADD  `user_points_froze` INT( 10 ) unsigned NOT NULL DEFAULT  '0' AFTER  `user_points`;";
    $sql .="\r";
}
/*2018.12.25.1001*/
if(empty($col_list[$pre.'art']['art_points'])){
    $sql .= "ALTER TABLE `mac_art` ADD `art_points` SMALLINT(6) unsigned NOT NULL DEFAULT '0',ADD `art_points_detail` SMALLINT( 6 ) unsigned NOT NULL DEFAULT '0',ADD `art_pwd` VARCHAR( 10 )  NOT NULL DEFAULT '',ADD `art_pwd_url`  VARCHAR(255)  NOT NULL DEFAULT '' ;";
    $sql .="\r";
}

if(empty($col_list[$pre.'vod']['vod_pwd'])){
    $sql .= "ALTER TABLE `mac_vod` ADD `vod_pwd` VARCHAR( 10 )  NOT NULL DEFAULT '',ADD `vod_pwd_url`  VARCHAR(255)  NOT NULL DEFAULT '',ADD `vod_pwd_play` VARCHAR( 10 )  NOT NULL DEFAULT '',ADD `vod_pwd_play_url`  VARCHAR(255)  NOT NULL DEFAULT '',ADD `vod_pwd_down` VARCHAR( 10 )  NOT NULL DEFAULT '',ADD `vod_pwd_down_url`  VARCHAR(255)  NOT NULL DEFAULT '',ADD `vod_copyright`  tinyint(1) unsigned NOT NULL DEFAULT '0',ADD `vod_points` SMALLINT( 6 ) unsigned NOT NULL DEFAULT '0'  ;";
    $sql .="\r";
}

if(empty($col_list[$pre.'user']['user_pid'])){
    $sql .= "ALTER TABLE `mac_user` ADD `user_pid` INT( 10 ) unsigned NOT NULL DEFAULT '0',ADD `user_pid_2`  INT( 10) unsigned  NOT NULL DEFAULT '0' ,ADD `user_pid_3`  INT( 10) unsigned  NOT NULL DEFAULT '0' ;";
    $sql .="\r";
}

if(empty($col_list[$pre.'plog'])){
    $sql .= "CREATE TABLE `mac_plog` (  `plog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `user_id` int(10) unsigned NOT NULL DEFAULT '0',  `user_id_1` int(10) unsigned NOT NULL DEFAULT '0',  `plog_type` tinyint(1) unsigned NOT NULL DEFAULT '1',  `plog_points` smallint(6) unsigned NOT NULL DEFAULT '0',  `plog_time` int(10) unsigned NOT NULL DEFAULT '0',  `plog_remarks` varchar(100) NOT NULL DEFAULT '',  PRIMARY KEY (`plog_id`),  KEY `user_id` (`user_id`),  KEY `plog_type` (`plog_type`) USING BTREE) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
    $sql .="\r";
}

if(empty($col_list[$pre.'cash'])){
    $sql .= "CREATE TABLE `mac_cash` (  `cash_id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `user_id` int(10) unsigned NOT NULL DEFAULT '0',  `cash_status` tinyint(1) unsigned NOT NULL DEFAULT '0',  `cash_points` smallint(6) unsigned NOT NULL DEFAULT '0',  `cash_money` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',  `cash_bank_name` varchar(60) NOT NULL DEFAULT '',  `cash_bank_no` varchar(30) NOT NULL DEFAULT '',  `cash_payee_name` varchar(30) NOT NULL DEFAULT '',  `cash_time` int(10) unsigned NOT NULL DEFAULT '0',  `cash_time_audit` int(10) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`cash_id`),  KEY `user_id` (`user_id`),  KEY `cash_status` (`cash_status`) USING BTREE) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
    $sql .="\r";
}
