<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_clipart`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_clipart')};
CREATE TABLE {$this->getTable('a2bizz_clipart')} (
  `clipart_id` int(11) UNSIGNED NOT NULL,
  `clipart_category_id` int(11) NOT NULL,
  `color_ids` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `print` smallint(6) NOT NULL,
  `colorable` smallint(6) NOT NULL,
  `price` decimal(11,4) NOT NULL,
  `content` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`clipart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
