<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_font`
--


-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_font')};
CREATE TABLE {$this->getTable('a2bizz_font')} (
  `font_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `font_ai` varchar(255) NOT NULL,
  `filename_boldttf` varchar(255) NOT NULL DEFAULT '',
  `filename_ttf` varchar(255) NOT NULL,
  `filename_italicttf` varchar(255) NOT NULL,
  `filename_bolditalicttf` varchar(255) NOT NULL,
  `ttf_image_name` varchar(255) NOT NULL,
  `boldttf_image_name` varchar(255) NOT NULL,
  `italicttf_image_name` varchar(255) NOT NULL,
  `bolditalicttf_image_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  
  PRIMARY KEY (`font_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 
