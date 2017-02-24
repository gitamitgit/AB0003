<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_store_color`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_store_color')};
CREATE TABLE {$this->getTable('a2bizz_store_color')} (
  `color_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `store_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `a2bizz_store_color` ADD KEY `A2BIZZ_STORE_COLOR_STORE` (`color_id`);
ALTER TABLE `a2bizz_store_color` ADD CONSTRAINT `a2bizz_store_color_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `a2bizz_color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");

$installer->endSetup(); 
