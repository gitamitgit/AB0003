<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_clipart_price`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_clipart_price')};
CREATE TABLE {$this->getTable('a2bizz_clipart_price')} (
  `clipart_price_id` int(11) UNSIGNED NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width_price` decimal(11,2) NOT NULL,
  `height_price` decimal(11,2) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`clipart_price_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
