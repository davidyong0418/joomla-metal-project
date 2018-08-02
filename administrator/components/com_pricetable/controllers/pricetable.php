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

jimport('joomla.application.component.controllerform');

/**
 * Pricetable controller class.
 */
class PricetableControllerPricetable extends JControllerForm
{

    function __construct() {
        $this->view_list = 'pricetables';
        parent::__construct();
    }

}