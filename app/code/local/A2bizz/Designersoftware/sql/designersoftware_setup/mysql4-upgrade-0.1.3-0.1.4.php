<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_store_parts`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_store_parts')};
CREATE TABLE {$this->getTable('a2bizz_store_parts')} (
  `parts_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `store_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `a2bizz_store_parts` ADD KEY `A2BIZZ_STORE_PARTS_STORE` (`parts_id`);
ALTER TABLE `a2bizz_store_parts` ADD CONSTRAINT `a2bizz_store_parts_ibfk_1` FOREIGN KEY (`parts_id`) REFERENCES `a2bizz_parts` (`parts_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");

$installer->endSetup(); 
