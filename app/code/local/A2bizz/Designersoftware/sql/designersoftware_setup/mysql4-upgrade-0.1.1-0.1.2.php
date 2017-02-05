<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_designersoftware`
--


-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_designersoftware')};
CREATE TABLE {$this->getTable('a2bizz_designersoftware')} (
  `designersoftware_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `style_design_code` varchar(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `sizes_info` varchar(255) NOT NULL,
  `total_price` decimal(11,4) NOT NULL,
  `fashion_lining` decimal(11,4) NOT NULL,
  `shoe_path` varchar(255) NOT NULL,
  `price_info_arr` text NOT NULL,
  `side_data_array` text NOT NULL,
  `design_data_array` text NOT NULL,
  `part_dropdown_arr` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`designersoftware_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
