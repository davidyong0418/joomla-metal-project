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

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Pricetables list controller class.
 */
class PricetableControllerPricetables extends PricetableController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Pricetables', $prefix = 'PricetableModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}