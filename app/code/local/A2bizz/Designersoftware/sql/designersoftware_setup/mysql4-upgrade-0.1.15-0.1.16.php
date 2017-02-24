<?php

$installer = $this;
$installer->startSetup();
$installer->run("

--
-- Creating Structure for table `a2bizz_store_clipart`
--

-- DROP TABLE IF EXISTS {$this->getTable('a2bizz_store_clipart')};
CREATE TABLE {$this->getTable('a2bizz_store_clipart')} (
  `clipart_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `store_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `a2bizz_store_clipart` ADD KEY `A2BIZZ_STORE_CLIPART_STORE` (`clipart_id`);
ALTER TABLE `a2bizz_store_clipart` ADD CONSTRAINT `a2bizz_store_clipart_ibfk_1` FOREIGN KEY (`clipart_id`) REFERENCES `a2bizz_clipart` (`clipart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");

$installer->endSetup(); 
