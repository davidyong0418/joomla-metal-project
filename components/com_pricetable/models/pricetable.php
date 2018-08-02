<?php

/**
 * @version     2.0.0
 * @package     com_pricetable
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Abdur Rashid <rashid.cse.05@gmail.com> - http://www.keenitsolution.com
 */
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

/**
 * Pricetable model.
 */
class PricetableModelPricetable extends JModelItem {
    public function &getData() {
	$app = JFactory::getApplication();
    $params = $app->getParams();
	$cat_id=$params->get('cat_id');
	$db =& JFactory::getDBO();
	$sql = "SELECT * FROM #__pricetable_pricetable WHERE plan_cat=$cat_id";
	$this->list = $this->_getList($sql);
	return $this->list;
    }
}
