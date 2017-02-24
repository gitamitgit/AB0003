<?php
/**
 * @category    A2bizz
 * @package     A2bizz_Designersoftware
 * @copyright   Copyright (c) 2016-2017  and affiliates (http://www.a2bizz.com)
 * @license     Open Software License (OSL 3.0)
 */

$designersoftwareAngles = array(
    array(
        'title'         => '000',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '045',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '090',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '135',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '180',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '225',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '270',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    ),
    array(
        'title'         => '315',
        'filename'    	=> '',
        'content'       => "",
        'status'     	=> 1,
        'created_time'	=> now(),
        'update_time'	=> now()
    )
);

/**
 * Insert default angles provided
 */
foreach ($designersoftwareAngles as $data) {
    Mage::getModel('designersoftware/angles')->setData($data)->save();
}
