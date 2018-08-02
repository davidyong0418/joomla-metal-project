<?php

/**
 * @version     2.0.0
 * @package     com_pricetable
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Abdur Rashid <rashid.cse.05@gmail.com> - http://www.keenitsolution.com
 */
defined('_JEXEC') or die;

class PricetableFrontendHelper {
    
	/**
	* Get category name using category ID
	* @param integer $category_id Category ID
	* @return mixed category name if the category was found, null otherwise
	*/
	public static function getCategoryNameByCategoryId($category_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select('title')
			->from('#__categories')
			->where('id = ' . intval($category_id));

		$db->setQuery($query);
		return $db->loadResult();
	}
	
	public static function getCategories() {
		$db = JFactory::getDbo();
		$query="SELECT * FROM #__categories where published=1 AND extension='com_pricetable'";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	public static function getPlans($cat_id) {
		$db = JFactory::getDbo();
		$query="SELECT * FROM #__pricetable_pricetable where state=1 AND plan_cat=".$cat_id;
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
