<?php

class A2bizz_Designersoftware_Adminhtml_ColorController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('designersoftware/color')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Color Manager'), Mage::helper('adminhtml')->__('Color Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('designersoftware/color')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('color_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('designersoftware/color');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Color Manager'), Mage::helper('adminhtml')->__('Color Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Color News'), Mage::helper('adminhtml')->__('Color News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('designersoftware/adminhtml_color_edit'))
				->_addLeft($this->getLayout()->createBlock('designersoftware/adminhtml_color_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('designersoftware')->__('Color does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			// ***************** STORE DATA *****************
			$storeData = $data;
			$data['title'] = $storeData['title'][1];
			// ***************** STORE DATA *********END********
			
			if(!empty($data['update_color_ids'])){
				Mage::helper('designersoftware/color_updateattributes')->updateAttributes($data);
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('designersoftware')->__('Color\'s was successfully Updated'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);
				$this->_redirect('*/*/');
				return;
			}
			
			if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('filename');
					
					// Any extention would work
	           		$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
							
					// We set media as the upload dir
					$path = Mage::getBaseDir('media') . DS ;
					$uploader->save($path, $_FILES['filename']['name'] );
					
				} catch (Exception $e) {
		      
		        }
	        
		        //this way the name is saved in DB
	  			$data['filename'] = $_FILES['filename']['name'];
			}
	  			
	  			
			$model = Mage::getModel('designersoftware/color');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				
				//********************** SAVE STORE DATA *********************************
				
				$storeData['color_id'] = $model->getId();					
				Mage::helper('designersoftware/store_color')->setDataById($storeData);	
					
				//********************** SAVE STORE DATA ******* END *********************
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('designersoftware')->__('Color was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('designersoftware')->__('Unable to find color to save'));
        $this->_redirect('*/*/');
	}
	
	public function updateAttributesAction(){
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('designersoftware/color')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}
			
			Mage::register('color_data', $model);
			Mage::register('color_update_attributes', 'updateAttributes');

			$this->loadLayout();
			$this->_setActiveMenu('designersoftware/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Manage Color'), Mage::helper('adminhtml')->__('Manage Color'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Color News'), Mage::helper('adminhtml')->__('Color News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('designersoftware/adminhtml_color_edit'))
				->_addLeft($this->getLayout()->createBlock('designersoftware/adminhtml_color_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('designersoftware')->__('Color does not exist'));
			$this->_redirect('*/*/');
		}
	 }
	
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('designersoftware/color');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Color was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $designersoftwareIds = $this->getRequest()->getParam('color');
        if(!is_array($designersoftwareIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select color(s)'));
        } else {
            try {
                foreach ($designersoftwareIds as $designersoftwareId) {
                    $designersoftware = Mage::getModel('designersoftware/color')->load($designersoftwareId);
                    $designersoftware->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($designersoftwareIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
	public function massClipStatusAction()
    {		
        $colorIds = $this->getRequest()->getParam('color');
        if(!is_array($colorIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($colorIds as $colorId) {
                    $color = Mage::getSingleton('designersoftware/color')
                        ->load($colorId)
                        ->setClipStatus($this->getRequest()->getParam('clip_status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($colorIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
    
     public function massTextStatusAction()
    {
        $colorIds = $this->getRequest()->getParam('color');
        if(!is_array($colorIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($colorIds as $colorId) {
                    $color = Mage::getSingleton('designersoftware/color')
                        ->load($colorId)
                        ->setNameStatus($this->getRequest()->getParam('text_status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($colorIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $designersoftwareIds = $this->getRequest()->getParam('color');
        if(!is_array($designersoftwareIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select color(s)'));
        } else {
            try {
                foreach ($designersoftwareIds as $designersoftwareId) {
                    $designersoftware = Mage::getSingleton('designersoftware/color')
                        ->load($designersoftwareId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($designersoftwareIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'designersoftware_color.csv';
        $content    = $this->getLayout()->createBlock('designersoftware/adminhtml_color_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'designersoftware_color.xml';
        $content    = $this->getLayout()->createBlock('designersoftware/adminhtml_color_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}
