<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_parts`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_parts')};
CREATE TABLE {$this->getTable('a2bizz_parts')} (
  `parts_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `sort_order` int(6) NOT NULL,  
  `parts_category` smallint(6) NOT NULL,
  `extras_category` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',  
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`parts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
