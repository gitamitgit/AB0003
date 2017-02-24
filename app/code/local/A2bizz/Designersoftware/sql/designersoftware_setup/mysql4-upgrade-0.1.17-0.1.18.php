<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_sizes`
--


-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_sizes')};
CREATE TABLE {$this->getTable('a2bizz_sizes')} (
  `sizes_id` int(11) UNSIGNED NOT NULL,
  `color_ids` text NOT NULL,
  `color_price` text NOT NULL,
  `default_color_id` int(11) NOT NULL,
  `default_color_price` decimal(11,4) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `price` decimal(11,4) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `colorable` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  
  PRIMARY KEY (`sizes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
