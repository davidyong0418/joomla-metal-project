<?php

/**
 * @version     2.0.0
 * @package     com_pricetable
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Abdur Rashid <rashid.cse.05@gmail.com> - http://www.keenitsolution.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Pricetable helper.
 */
class PricetableHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_PRICETABLE_TITLE_PRICETABLES'),
			'index.php?option=com_pricetable&view=pricetables',
			$vName == 'pricetables'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_PRICETABLE_TITLE_PRICETABLES') . ')',
			"index.php?option=com_categories&extension=com_pricetable",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Price table: JCATEGORIES (COM_PRICETABLE_TITLE_PRICETABLES)');
		}

    }
	
	public static function getfeatures($id){
	
	 $db=JFactory::getDBO();
	 $features_sql="Select features FROM #__pricetable_pricetable where id=".$id;
	 $db->setQuery($features_sql);
	 $result=$db->loadObjectList();
	 foreach($result as $row):
		$feature_name=$row->features;
	 endforeach;
	 $features=explode('|', $feature_name);
	 $n=count($features);
	 for($j=0;$j<$n;$j++){?>
	<div><input name='features[]' type='text' class='in_box' value='<?php echo $features[$j]; ?>' /><span class='rem_plan' ><a href='javascript:void(0);' class='in_box' >Remove</a></span></div>
	<?php }
	}

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_pricetable';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
