<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_parts_style`
--

CREATE TABLE `a2bizz_parts_style` (
  `parts_style_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parts_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL,
  `price` decimal(11,4) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `sort_order` int(6) NOT NULL,
  `parts_category` smallint(6) NOT NULL,
  `extras_category` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`parts_style_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


");

$installer->endSetup(); 
