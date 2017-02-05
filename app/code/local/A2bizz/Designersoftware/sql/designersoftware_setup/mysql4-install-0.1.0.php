<?php

$installer = $this;

$installer->startSetup();

$installer->run("

--
-- Creating Structure for table `a2bizz_angles`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_angles')};
CREATE TABLE {$this->getTable('a2bizz_angles')} (
  `angles_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`angles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
