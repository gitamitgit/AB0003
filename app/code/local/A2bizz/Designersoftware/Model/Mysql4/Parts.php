<?php

class A2bizz_Designersoftware_Model_Mysql4_Parts extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the parts_id refers to the key field in your database table.
        $this->_init('designersoftware/parts', 'parts_id');
    }
}
