<?php

class A2bizz_Designersoftware_Model_Mysql4_Texture_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('designersoftware/texture');
    }
}