<?php

class A2bizz_Designersoftware_Model_Parts_Layers_Texture extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('designersoftware/parts_layers_texture');
    }    
    
    public function getCode($textureId){
		$collection = $this->getCollection()->addFieldToFilter('texture_id',$textureId)->getFirstItem();
		return $collection['texture_code'];
	}
	
	public function getTextureCollection($textureId){
		
		$collection = Mage::getModel('designersoftware/texture')->getCollection()->addFieldToFilter('texture_id',$textureId)->getFirstItem();		
		return $collection;
	}
	
	public function getCollectionById($textureId){
		
		$collection = Mage::getModel('designersoftware/texture')->getCollection()->addFieldToFilter('texture_id',$textureId)->getFirstItem();		
		return $collection;
	}
}
