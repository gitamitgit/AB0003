<?php
class A2bizz_Designersoftware_Block_Adminhtml_Angles extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {	
    $this->_controller = 'adminhtml_angles';
    $this->_blockGroup = 'designersoftware';
    $this->_headerText = Mage::helper('designersoftware')->__('Angles Manager');
    $this->_addButtonLabel = Mage::helper('designersoftware')->__('Add Angles');
    
    parent::__construct();  
    $this->_removeButton('add');  
  }
}
