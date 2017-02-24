<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_parts_layers`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_parts_layers')};
CREATE TABLE {$this->getTable('a2bizz_parts_layers')} (
  `parts_layers_id` int(11) UNSIGNED NOT NULL,
  `texture_ids` text NOT NULL,
  `parts_id` int(11) NOT NULL,
  `parts_style_id` int(11) NOT NULL,
  `color_ids` text NOT NULL,
  `color_price` text NOT NULL,
  `default_color_id` int(11) NOT NULL,
  `default_color_price` decimal(11,4) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `layer_code` varchar(10) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `sort_order` int(6) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`parts_layers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
