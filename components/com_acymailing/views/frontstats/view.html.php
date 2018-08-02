<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.9.0
 * @author	acyba.com
 * @copyright	(C) 2009-2018 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');
?><?php
include(ACYMAILING_BACK.'views'.DS.'stats'.DS.'view.html.php');

class FrontstatsViewFrontstats extends StatsViewStats{

	var $ctrl='frontstats';

	function display($tpl = null){
		global $Itemid;
		$this->Itemid = $Itemid;
		parent::display($tpl);
	}
}
