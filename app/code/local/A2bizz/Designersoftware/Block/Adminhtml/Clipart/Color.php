<?php
class A2bizz_Designersoftware_Block_Adminhtml_Clipart_Color extends Mage_Adminhtml_Block_Widget_Grid_Container
{	
  public function __construct()
  {	
    $this->_controller = 'adminhtml_clipart_color';
    $this->_blockGroup = 'designersoftware';
    $this->_headerText = Mage::helper('designersoftware')->__('Color Manager');
    $this->_addButtonLabel = Mage::helper('designersoftware')->__('Add Color');
    
    parent::__construct();  
    //$this->_removeButton('add');  
  }
}
