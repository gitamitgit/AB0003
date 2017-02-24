<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_store_parts_layers`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_store_parts_layers')};
CREATE TABLE {$this->getTable('a2bizz_store_parts_layers')} (
  `parts_layers_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `store_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `a2bizz_store_parts_layers` ADD KEY `A2BIZZ_STORE_PARTS_LAYERS_STORE` (`parts_layers_id`);
ALTER TABLE `a2bizz_store_parts_layers` ADD CONSTRAINT `a2bizz_store_parts_layers_ibfk_1` FOREIGN KEY (`parts_layers_id`) REFERENCES `a2bizz_parts_layers` (`parts_layers_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");

$installer->endSetup(); 
