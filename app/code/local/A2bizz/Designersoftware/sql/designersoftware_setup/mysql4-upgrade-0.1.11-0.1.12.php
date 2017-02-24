<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_clipart_category`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_clipart_category')};
CREATE TABLE {$this->getTable('a2bizz_clipart_category')} (
  `clipart_category_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`clipart_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
