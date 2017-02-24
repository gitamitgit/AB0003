<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_color`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_color')};
CREATE TABLE {$this->getTable('a2bizz_color')} (
  `color_id` int(11) UNSIGNED NOT NULL,
  `texture_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `colorcode` varchar(10) NOT NULL,
  `clip_price` decimal(11,4) NOT NULL,
  `text_price` decimal(11,4) NOT NULL,
  `clip_status` smallint(6) NOT NULL,
  `text_status` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
