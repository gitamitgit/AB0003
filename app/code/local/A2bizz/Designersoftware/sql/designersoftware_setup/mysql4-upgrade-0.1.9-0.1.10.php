<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_texture`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_texture')};
CREATE TABLE {$this->getTable('a2bizz_texture')} (
  `texture_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `texture_code` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`texture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
