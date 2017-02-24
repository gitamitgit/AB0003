<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_store_parts_style`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_store_parts_style')};
CREATE TABLE {$this->getTable('a2bizz_store_parts_style')} (
  `parts_style_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `store_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `a2bizz_store_parts_style` ADD KEY `A2BIZZ_STORE_PARTS_STYLE_STORE` (`parts_style_id`);
ALTER TABLE `a2bizz_store_parts_style` ADD CONSTRAINT `a2bizz_store_parts_style_ibfk_1` FOREIGN KEY (`parts_style_id`) REFERENCES `a2bizz_parts_style` (`parts_style_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");

$installer->endSetup(); 
